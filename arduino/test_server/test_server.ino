/*
Geekstips.com
IoT project - Communication between two ESP8266 - Talk with Each Other
ESP8266 Arduino code example
*/
#include <SHT1x.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#define LED_BUILTIN 2
#define SS1_PIN  A0
#define dataPin  D3
#define clockPin D1
SHT1x sht1x(dataPin, clockPin);

//int data1, data2, data3, data4;

// Internet router credentials
const char* ssid = "iot";
const char* password = "kkkkkkkk";
unsigned char data1 = 0;
unsigned char data2 = 0;
unsigned char data3 = 0;
unsigned char data4 = 0;
String data = "";
String url = "http://iotduynguyen.cf/public/add-data/";


ESP8266WebServer server(80);

void setup() {
  pinMode(D7,OUTPUT);
  digitalWrite(D7,LOW);
  pinMode(LED_BUILTIN, OUTPUT); 
  pinMode(SS1_PIN, INPUT);
  delay(1000);
  
  Serial.begin(74880);
  WiFi.mode(WIFI_AP_STA);
  setupAccessPoint();
}
// Handling the / root web page from my server
void handle_index() {
  server.send(200, "text/plain", "Nếu bạn không thuộc người quản trị vui lòng liên hệ 0918420515");
}

// Handling the /feed page from my server
void handle_feed() {
  readSensorTest();
  server.send(200, "text/plain", data);
}

void setupAccessPoint(){
  Serial.println("** SETUP ACCESS POINT **");
  Serial.println("- disconnect from any other modes");
  WiFi.disconnect();
  Serial.println("- start ap with SID: "+ String(ssid));
  WiFi.softAP(ssid, password);
  IPAddress myIP = WiFi.softAPIP();
  Serial.print("- AP IP address is :");
  Serial.print(myIP);
  setupServer();
}

void setupServer(){
  Serial.println("** SETUP SERVER **");
  Serial.println("- starting server :");
  server.on("/", handle_index);
  server.on("/feed", handle_feed);
  server.begin();
};

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
  data = String(data1) +'/'+ String(data2) +'/'+ String(data3) +'/'+ String(data4);
}

void loop() {
  server.handleClient();
}
