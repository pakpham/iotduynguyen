/*
   HTTP Client POST Request
   Copyright (c) 2018, circuits4you.com
   All rights reserved.
   https://circuits4you.com
   Connects to WiFi HotSpot. */
#include <SHT1x.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#define LED_BUILTIN 2
#define SS1_PIN  A0
#define dataPin  D3
#define clockPin D1
SHT1x sht1x(dataPin, clockPin);

int data1, data2, data3, data4;

/* Set these to your desired credentials. */
const char *ssid = "PAK"; 
const char *password = "kkkkkkkk";

//const char *ssid = "Home 4";  //ENTER YOUR WIFI SETTINGS
//const char *password = "home3839011";

//const char *ssid = "TANG 2.2";
//const char *password = "123456789";

//const char *ssid = "Cafe Cau Ba";  //ENTER YOUR WIFI SETTINGS
//const char *password = "77779999";

//Web/Server address to read/write from
const char *host = "172.20.10.4";   //https://circuits4you.com website or IP address of server

//=======================================================================
//                    Power on setup
//=======================================================================

String compressData(int data1,int data2,int data3,int data4){
  String url = "http://iotduynguyen.cf/public/add-data/";
  String str1= String(data1);
  String str2= String(data2);
  String str3= String(data3);
  String str4= String(data4);
  url = url + str1 +'/'+str2+'/'+str3+'/'+str4;
  return url;
}
void readSensor(){
//  data1 = random(20,50);
//  data2 = random(20,50);
//  data3 = random(20,50);
//  data4 = random(20,50);
  unsigned int ss1 = 0;
  ss1 = analogRead(SS1_PIN);
  data1 = map(ss1,0,1023,0,100);
  data2 = sht1x.readTemperatureC();
  data3 = sht1x.readHumidity();
  Serial.print("DATA SENSOR 1:");
  Serial.println (data1);
  Serial.print("DATA SENSOR 2:");
  Serial.println (data2);
  Serial.print("DATA SENSOR 3:");
  Serial.println (data3);
}

void readSensorRandom(){
  data1 = random(20,50);
  data2 = random(20,50);
  data3 = random(20,50);
  data4 = random(20,50);
}

void setup() {

  pinMode(D7,OUTPUT);
  digitalWrite(D7,LOW);
  pinMode(LED_BUILTIN, OUTPUT); 
  pinMode(SS1_PIN, INPUT);
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot

  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(LED_BUILTIN, LOW); 
    delay(5);
    Serial.print(".");
    digitalWrite(LED_BUILTIN, HIGH);
    delay(1995);
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(50);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(50);
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(50);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(50);
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(50);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);

}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  //String url = "http://172.20.10.4/iotduynguyen/public/testpub/MCU/test";
  readSensor();
  String url = compressData(data1,data2,data3,data4);
  HTTPClient http;    //Declare object of class HTTPClient
  String ADCData, station, postData;
  int adcvalue = analogRead(A0); //Read Analog value of LDR
  ADCData = String(adcvalue);   //String to interger conversion
  station = "A";

  //Post Data
  postData = "status=" + ADCData + "&station=" + station ;

  http.begin(url);              //Specify request destination
  //int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload
  //Serial.println(httpCode);   //Print HTTP return code
  //Serial.println(payload);    //Print request response payload
  Serial.print("PAK URL:");
  Serial.println(url);
  Serial.println(http.GET());
  http.end();  //Close connection

  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(1);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(1);   
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(1);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(3000);  //Post Data at every 5 seconds
}
//=======================================================================
