public class Triangulo extends Figura{

    double base;
    double altura;
    //Declara as variaveis base e altura

    public Triangulo(double base, double altura, String cor){
        this.base = base;
        this.altura = altura;
        this.cor = cor;
    }
    //Configura as variaveis para receberem seus devidos valores

    public void setBase(double base){
        this.base = base;
    }
    public void setAltura(double altura){
        this.altura = altura;
    }

    public double getArea(){
        return (base * altura) / 2;
    }
    //Método para calcular a área do triângulo

    public String toString(){
        return "Triangulo [base=" + base + ", altura=" + altura + ", cor=" + getCor() + "]";
    }
    //O método fornece uma representação do objeto
}
