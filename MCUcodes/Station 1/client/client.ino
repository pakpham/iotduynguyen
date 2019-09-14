#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>



#include <SerialCommand.h> // Thêm vào sketch thu vin Serial Command 
SerialCommand sCmd; // Khai báo bin s dng thu vin Serial Command
#define LED_BUILTIN  2
//void setupWifi();
//void data_interrupt();
//void blinkLed(char t);

void setup() {
  Serial.begin(9600);
  pinMode(LED_BUILTIN, OUTPUT);
  sCmd.addCommand("DATA", data_interrupt);
  setupWifi();
}
void setupWifi() {
  //WiFi.reconnect();
  WiFi.begin("iot2", "kkkkkkkk");
  while (WiFi.status() != WL_CONNECTED) {
    blinkLed(100);
    blinkLed(100);
    //Serial.print(".");
  }
  blinkLed(50);
  blinkLed(50);
  //Serial.println("1");
}
void data_interrupt() {
  //Serial.println("3");
  String arg;
  arg = sCmd.next();
  //data = arg;
  if ((WiFi.status() == WL_CONNECTED)) {
    WiFiClient client;
    HTTPClient http;
    http.begin(client, "http://192.168.4.1"+arg);
    http.GET();
    http.end();
    blinkLed(50);
    blinkLed(50);
    blinkLed(50);
    blinkLed(50);
    ESP.restart();
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

}
