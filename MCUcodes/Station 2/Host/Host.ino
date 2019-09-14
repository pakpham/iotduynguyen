#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#define LED_BUILTIN 2
#define LED_BUILTIN 2

const char* ssid = "iot2";
const char* password = "kkkkkkkk";
String data = "";

ESP8266WebServer server(80);

void setup() {
  Serial.begin(9600);
  pinMode(LED_BUILTIN, OUTPUT);
  WiFi.mode(WIFI_AP_STA);
  setupAccessPoint();
}
void setupAccessPoint() {
  Serial.println("** SETUP ACCESS POINT **");
  Serial.println("- disconnect from any other modes");
  WiFi.disconnect();
  Serial.println("- start ap with SID: " + String(ssid));
  WiFi.softAP(ssid, password);
  IPAddress myIP = WiFi.softAPIP();
  Serial.print("- AP IP address is :");
  Serial.print(myIP);
  setupServer();
}
void setupServer() {
  Serial.println("** SETUP SERVER **");
  Serial.println("- starting server :");
  server.on("/", handle_index);
  server.onNotFound([]() {
    interrupt();
  });
  server.begin();
  blinkLed();
};
void handle_index() {
  server.send(200, "text/plain", "Nếu bạn không thuộc người quản trị vui lòng liên hệ 0918420515");
}
void interrupt(){
  blinkLed();
  Serial.print("SERVER NOTFOUNT: ");
  data = server.uri();
  Serial.println("DATA "+data);
  server.send(200, "text/plain", data);
}



















void loop() {
  //digitalWrite(LED, LOW);
  server.handleClient();
  //digitalWrite(LED, HIGH);
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
