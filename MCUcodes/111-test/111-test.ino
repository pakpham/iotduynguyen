/**
   BasicHTTPClient.ino

    Created on: 24.05.2015

*/

#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <ESP8266HTTPClient.h>

#include <WiFiClient.h>
#include <SHT1x.h>

ESP8266WiFiMulti WiFiMulti;

////////////////////////////
#define LED_BUILTIN 2
#define SS1_PIN  A0
#define dataPin  D3
#define clockPin D1
SHT1x sht1x(dataPin, clockPin);

unsigned char data1 = 0;
unsigned char data2 = 0;
unsigned char data3 = 0;
unsigned char data4 = 0;
String data = "";
/////////////////////////////



void setup() {

  Serial.begin(115200);
  // Serial.setDebugOutput(true);
  pinMode(LED_BUILTIN, OUTPUT);
  Serial.println();
  Serial.println();
  Serial.println();

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    blinkLed(300);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("iot1", "kkkkkkkk");

}

void loop() {

  readSensor();
  Serial.print("SESOR:  ");
  Serial.println(data);
  
  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {

    WiFiClient client;

    HTTPClient http;

    Serial.print("[HTTP] begin...\n");
    if (http.begin(client, "http://192.168.4.1/"+data)) {  // HTTP
      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          String payload = http.getString();
          Serial.println(payload);
          blinkLed(100);
          Serial.println("SEND OKEEEE");
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
      }

      http.end();
    } else {
      Serial.printf("[HTTP} Unable to connect\n");
    }
  }

  delay(15000);
}













//=======================================================================
void blinkLed(char t) {
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(t);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(t);
}

void readSensor(){
  unsigned int ss1 = 0;
  ss1 = analogRead(SS1_PIN);
  data1 = map(ss1,0,1023,0,100);
  data2 = sht1x.readTemperatureC();
  data3 = sht1x.readHumidity();
  //'Serial.print("DATA SENSOR 1:");
  //'Serial.println (data2);
  data4 = 0;
  data = String(data1) + String(data2) + String(data3) + "2";
}
