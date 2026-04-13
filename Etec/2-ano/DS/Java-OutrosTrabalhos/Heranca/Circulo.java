public class Circulo extends Figura{
    double raio;
    //Declara a variavel raio

    public Circulo(double raio, String cor){
        this.raio = raio;
        this.cor = cor;
    }
    //Configura as variaveis para receberem seus devidos valores

    public void setRaio(){
        this.raio = raio;
    }

    public double getRaio(){
        return raio;
    }
    public double area(){
        return Math.PI * raio * raio;
    }
    //Método para calcular a área do círculo

    public double getDiametro(){
        return 2 * raio;
    }
    //Método para obter o diâmetro do círculo

    public String toString(){
        return "Circulo [raio=" + raio + ", cor=" + getCor() + "]";
    }
    //O método fornece uma representação do objeto
}
