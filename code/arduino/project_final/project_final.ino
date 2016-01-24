#include <EEPROM.h>
#include <SPI.h>
#include <WiFi.h>

//thuis
char ssid[] = "STS-VanReeth";     //  your network SSID (name) 
char pass[] = "6007001972";   // your network password
int keyIndex = 0;            // your network key Index number (needed only for WEP)

int status = WL_IDLE_STATUS;
char server[] = "lockedornot-jolitagrazyte.c9users.io/";    // name address for Google (using DNS)

WiFiClient client;
int outPin = 13; // LED connected to digital pin 13
int inPin = 7;   // pushbutton connected to digital pin 7
int val = 0;     // variable to store the read value
int adress = 0; //eeprom adress om op te slaan
String data = "";
void setup() {

  pinMode(outPin, OUTPUT);      // sets the digital pin 13 as output
  digitalWrite(outPin, HIGH);
  pinMode(inPin, INPUT);      // sets the digital pin 7 as input

  //Initialize serial and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }

  // check for the presence of the shield:
  if (WiFi.status() == WL_NO_SHIELD) {
    Serial.println("WiFi shield not present");
    // don't continue:
    while (true);
  }

  String fv = WiFi.firmwareVersion();
  if ( fv != "1.1.0" )
    Serial.println("Please upgrade the firmware");

  // attempt to connect to Wifi network:
  while (status != WL_CONNECTED) {
    Serial.print("Attempting to connect to SSID: ");
    Serial.println(ssid);
    // Connect to WPA/WPA2 network. Change this line if using open or WEP network:
    status = WiFi.begin(ssid, pass);

    // wait 10 seconds for connection:
    delay(10000);
  }
  Serial.println("Connected to wifi");
  printWifiStatus();
  

}

void loop() {

  val = digitalRead(inPin);   // read the input pin
  
   if(EEPROM.read(adress)!=val){
     EEPROM.write(adress, val);
    Serial.println(val);

    data = "data=" + val + "&id=LRN22244";
      if (client.connect(server, 80)) {
                    client.println("POST /add.php HTTP/1.1");
                    client.println("Host: lockedornot-jolitagrazyte.c9users.io/");
                    client.println("User-Agent: gizDuinodev1/1.0");
                    client.println("Content-Type: Application/x-www-form-urlencoded");
                    client.println("Content-Length: 18"); // notice not println to not get a linebreak
                    client.println("");               // to get the empty line
                    client.println(data);         
                    
      }
   }

  

  
  // if there are incoming bytes available
  // from the server, read them and print them:
  while (client.available()) {
    char c = client.read();
    Serial.write(c);
  }

  // if the server's disconnected, stop the client:
  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting from server.");
    client.stop();

    // do nothing forevermore:
    while (true);
  }
}


void printWifiStatus() {
  // print the SSID of the network you're attached to:
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  // print your WiFi shield's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

  // print the received signal strength:
  long rssi = WiFi.RSSI();
  Serial.print("signal strength (RSSI):");
  Serial.print(rssi);
  Serial.println(" dBm");
}





