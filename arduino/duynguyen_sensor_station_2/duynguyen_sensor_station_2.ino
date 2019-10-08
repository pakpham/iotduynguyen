/**
   Authorization.ino

    Created on: 09.12.2015

*/

#include <Arduino.h>
#include <SHT1x.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
ESP8266WiFiMulti WiFiMulti;
////////////////////////////
#define LED_BUILTIN 2
#define SS1_PIN  A0
#define dataPin  D3
#define clockPin D1
SHT1x sht1x(dataPin, clockPin);
const char* ssid = "sss1";
const char* password = "kkkkkkkk";
unsigned char data1 = 0;
unsigned char data2 = 0;
unsigned char data3 = 0;
unsigned char data4 = 0;
String data = "";
String url = "http://iotduynguyen.cf/public/add-data/";
/////////////////////////////
void setupWifi();

void setup() {
  Serial.begin(9600);
  pinMode(LED_BUILTIN, OUTPUT);
  // Serial.setDebugOutput(true);
  pinMode(SS1_PIN, INPUT);
  setupWifi();
}
void setupWifi() {
  for (uint8_t t = 4; t > 0; t--) {
    delay(300);
  }
  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("iot1", "kkkkkkkk");
  blinkLed(100);
}



void loop() {
  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {
    WiFiClient client;
    HTTPClient http;
    Serial.print("[HTTP] begin...\n");
    // configure traged server and url
    readSensor();
    http.begin(client, "http://192.168.4.1/"+data);
    Serial.print("[HTTP] GET...\n");

    int httpCode = http.GET();

    // httpCode will be negative on error
    if (httpCode > 0) {
      // HTTP header has been send and Server response header has been handled
      Serial.printf("[HTTP] GET... code: %d\n", httpCode);

      // file found at server
      if (httpCode == HTTP_CODE_OK) {
        String payload = http.getString();
        Serial.println(payload);
      }
    } else {
      Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
    }

    http.end();
  }


  blinkLed(50);
  blinkLed(50);
  blinkLed(50);
  delay(10000);
}

















//=======================================================================
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
void readSensorTest(){
  data1 = random(0,50);
  data2 = random(0,50);
  data3 = random(0,50);
  data4 = random(0,50);
  //delay(3000);
  //data = String(data1)+String(data2)+String(data3)+String(data4);
  data = String(data1) +'/'+ String(data2) +'/'+ String(data3) +'/'+ String(data4);
}
void readSensor(){
  unsigned int ss1 = 0;
  ss1 = analogRead(SS1_PIN);
  data1 = map(ss1,0,1023,0,100);
  data2 = sht1x.readTemperatureC();
  data3 = sht1x.readHumidity();
  Serial.print("DATA SENSOR 1:");
  Serial.println (data2);
  data4 = 0;
  data = String(data1) + String(data2) + String(data3) + "1";
}
