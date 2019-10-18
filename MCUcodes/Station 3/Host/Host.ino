#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#define LED_BUILTIN 2



//String url1 = "http://iotduynguyen.cf/public/add-data";
//String url2 = "http://iotduynguyen.cf/public/add-data-2";

String url1 = "http://iot.duy-nguyen.com/public/add-data";
String url2 = "http://iot.duy-nguyen.com/public/add-data-2";

String url = "";
String data = "";

ESP8266WebServer server(80);

void setup() {
  Serial.begin(9600);
  pinMode(LED_BUILTIN, OUTPUT);
  WiFi.mode(WIFI_AP_STA);
  setupAccessPoint();
  setupServer();
}
void setupAccessPoint() {
  Serial.println("** SETUP ACCESS POINT **");
  WiFi.softAP("iot3", "kkkkkkkk");
}
void setupServer() {
  Serial.println("** SETUP SERVER **");
  server.on("/", handle_index);
  server.onNotFound([]() {
    interrupt();
  });
  server.begin();
  blinkLed();
};
void handle_index() {
  server.send(200, "text/plain", "home");
}
void interrupt(){
  blinkLed();
  Serial.print("SERVER NOTFOUNT: ");
  data = server.uri();
  Serial.println("DATA "+data);
  server.send(200, "text/plain", "DONE!");
  publicData();
}


















void publicData(){
  WiFi.disconnect();

  setupInternet();
  
  WiFiClient client;
  HTTPClient http;    //Declare object of class HTTPClient
  sapxepData();
  http.begin(client,url);      
  int httpCode = http.GET();
  //String payload = http.getString();   
  Serial.print("URL SERVER: ");
  Serial.println(url);
  Serial.println("PUSH DATA DONE");
  ESP.reset();
}
void setupInternet(){
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  WiFi.begin("PAK", "kkkkkkkk");     //Connect to your WiFi router
  while (WiFi.status() != WL_CONNECTED) {
    blinkLed();
    blinkLed();
    Serial.println(".");
  }
  Serial.println("Connected Server!");
}
void loop() {
  //digitalWrite(LED, LOW);
  server.handleClient();
  //digitalWrite(LED, HIGH);
}

//   /00/00/00/00
//   012345678900

//   01234567
//   /1122334
void sapxepData(){
  String sss = "0";
  sss = data[data.length()-1];
  Serial.print("STATION: ");
  Serial.println(sss);
  if (sss == "1"){
    char i = 0;
    String temp= "/00/00/00/00";
    temp[1] = data[1]; 
    temp[2] = data[2];
    temp[4] = data[3];
    temp[5] = data[4];
    temp[7] = data[5];
    temp[8] = data[6];     
    data = temp;
    url = url1 + data;
  }
  if (sss == "2"){
    char i = 0;
    String temp= "/00/00/00/00";
    temp[1] = data[1]; 
    temp[2] = data[2];
    temp[4] = data[3];
    temp[5] = data[4];
    temp[7] = data[5];
    temp[8] = data[6];     
    data = temp;
    url = url2 + data;
  }
}
void blinkLed() {
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(50);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(50);
  digitalWrite(LED_BUILTIN, LOW);   // Turn the LED on (Note that LOW is the voltage level
  delay(50);                      // Wait for a second
  digitalWrite(LED_BUILTIN, HIGH);
  delay(50);
}
