void setup()
{
  Serial.begin(9600);
  pinMode(A0, INPUT);
  pinMode(9, OUTPUT);
}

void loop()
{
  Serial.print("Luz do Ambiente: ");
  Serial.println(analogRead(A0));
  if (analogRead(A0) < 200) {
    digitalWrite(9, HIGH);
  } else {
    digitalWrite(9, LOW);
  }
  delay(10); 
}
