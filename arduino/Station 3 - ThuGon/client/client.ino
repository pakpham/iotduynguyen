#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
ESP8266WiFiMulti WiFiMulti;
String data = "";


#include <SerialCommand.h> // Thêm vào sketch thu vin Serial Command 
SerialCommand sCmd; // Khai báo bin s dng thu vin Serial Command
#define LED_BUILTIN  2
void setupWifi();

void setup() {
  Serial.begin(9600);
  Serial.println();
  Serial.println();
  Serial.println("00");
  // Mt s hàm trong thu vin Serial Comman
  sCmd.addCommand("DATA", data_interrupt);
  setupWifi();
}
void setupWifi() {
  for (uint8_t t = 4; t > 0; t--) {
    delay(100);
  }
  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("iot3", "kkkkkkkk");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  blinkLed(50);
  blinkLed(50);
  blinkLed(50);
  Serial.println("11");
}
void data_interrupt() {
  blinkLed(50);
  char *temp = "111";
  Serial.println(temp);
  String arg;
  arg = sCmd.next();
  data = arg;
  if ((WiFiMulti.run() == WL_CONNECTED)) {
    Serial.println("1111111");
    WiFiClient client;
    HTTPClient http;
    http.begin(client, "http://192.168.4.1"+data);
    http.GET();
//    if (httpCode > 0) {
//      blinkLed(50);
//      blinkLed(50);
//      blinkLed(50);
//      blinkLed(50);
//    } else {
//    }
    http.end();
  }
}






















void loop() {
  sCmd.readSerial();
}
void blinkLed(char t) {
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(t);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(t);
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(t);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(t);
}
