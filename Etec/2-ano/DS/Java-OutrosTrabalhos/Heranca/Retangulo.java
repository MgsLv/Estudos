public class Retangulo extends Figura{

    public String cor;
    double lado1;
    double lado2;
    //Declara as variaveis cor, lado1 e lado2

   public Retangulo(double lado1, double lado2, String cor){
           this.lado1 = lado1;
           this.lado2 = lado2;
           this.cor = cor;
   }
   //Configura as variaveis para receberem seus devidos valores

    public double getLado1(){
        return lado1;
    }
    //Retorna a variavel lado1 ao seu valor normal
    public double getLado2(){
       return lado2;
    }
    //Retorna a variavel lado2 ao seu valor normal

    public double area;

   //Declara a variavel area como sendo do tipo double

   public String toString(){
       return "Retangulo [lado1=" + lado1 + ", lado2=" + lado2 + ", cor=" + cor + "]";
   }
   //O método fornece uma representação do objeto
}
