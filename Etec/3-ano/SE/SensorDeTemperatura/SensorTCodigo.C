int temperatura = 0;

void setup()
{
  Serial.begin(9600);
  pinMode(A0, INPUT);
  pinMode(9, OUTPUT);
}

void loop()
{
  Serial.print("Temperatura do Ambiente: ");
  temperatura = (-40 + 0.488155 * (analogRead(A0) - 20));
  Serial.println("hello world");
  if ((-40 + 0.488155 * (analogRead(A0) - 20)) > 28) {
    tone(9, 440 * pow(2.0, (constrain(int(temperatura), 35, 127) - 57) / 12.0), 1000);
  } else {
    noTone(9);
  }
  delay(10); 
}
