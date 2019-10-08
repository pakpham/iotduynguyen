/*
   HTTP Client POST Request
   Copyright (c) 2018, circuits4you.com
   All rights reserved.
   https://circuits4you.com
   Connects to WiFi HotSpot. */

#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <PubSubClient.h>
#include <ESP8266HTTPClient.h>
#define LED_BUILTIN 2
unsigned long previousMillis = 0;
const long interval = 15000;
char stateCon = 1; // 1: to senser , 0; to esp Hosting

int data1, data2, data3, data4;
String url = "http://iotduynguyen.cf/public/add-data/";
String data = "";


const char* mqttServer = "soldier.cloudmqtt.com";
const int mqttPort = 17796;
const char* mqttUser = "ozpngmdi";
const char* mqttPassword = "3IswwuNslcAy";
WiFiClient espClient;
PubSubClient client(espClient);

/* Set these to your desired credentials. */
//const char *ssid = "PAKK";
//const char *password = "qweasdzxc1";

const char *ssid = "PAK";
const char *password = "kkkkkkkk";

const char *ssidClient = "iot";
const char *passwordClient = "kkkkkkkk";

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


void setup() {

  pinMode(LED_BUILTIN, OUTPUT);
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot

  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting (WEB SERVER)");
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
  blinkLed();

}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  //String url = "http://172.20.10.4/iotduynguyen/public/testpub/MCU/test";

  unsigned long currentMillis = millis();
  if (currentMillis - previousMillis >= interval) {

    WiFi.mode(WIFI_OFF);
    WiFi.begin(ssidClient, passwordClient);
    Serial.print("Connecting Client (EPS HOSTING");
    unsigned char counter_connect_client = 0;
    unsigned char state_client_connect = 1;
    while (WiFi.status() != WL_CONNECTED) {
      counter_connect_client = counter_connect_client + 1;
      delay(1000);
      if (counter_connect_client > 10) {
        state_client_connect = 0;
        break;
      }
    }
    if (state_client_connect == 1) {
      Serial.println("");
      Serial.print("Connected to ");
      Serial.println(ssidClient);
      Serial.print("IP address: ");
      Serial.println(WiFi.localIP());

      //CONNECT TO CLIENT TO READ SENSOR
      HTTPClient http1;    
      http1.begin("http://192.168.4.1/feed");    
      int httpcode1 =  http1.GET();         
      String payload1 = http1.getString();  
      data = payload1; 
      Serial.println("======:INFOR CLIENT:====== ");
      Serial.print("Http code(): ");
      Serial.println(httpcode1);
      Serial.print("PAYLOAD:");
      Serial.println(payload1);    //Print request response payload
      http1.end();  //Close connection
      Serial.println("READ SENSOR DONE");


      delay(3000);
      pushData();
      

    } else if (state_client_connect == 0) {
      Serial.println("Connect to esp Client fail");
    }
    previousMillis = currentMillis;
  }
}












//=======================================================================
void blinkLed() {
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

//
void pushData(){
  setupInternet();
  WiFiClient client;
  HTTPClient http;    //Declare object of class HTTPClient
  http.begin(client,url+data);              //Specify request destination
  //int httpCode = http.POST(postData);   //Send the request
  int httpCode = http.GET();
  String payload = http.getString();    //Get the response payload
  Serial.print("URL SERVER: ");
  Serial.println(url+data);
  Serial.println("HTTP CODE:  ");
  Serial.println(httpCode);   //Print HTTP return code
  //Serial.print("PAYLOAD: ");
  //Serial.println(payload);    //Print request response payload
  http.end();  //Close connection
  blinkLed();
  Serial.println("PUSH DATA DONE");
}
void setupInternet(){
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot

  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting (WEB SERVER)");
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
  blinkLed();
}
