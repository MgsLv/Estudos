import java.util.Scanner;

public class MultiToolProgram {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int choice;

        do {
            System.out.println("Escolha uma opção:");
            System.out.println("1. Calculadora Simples");
            System.out.println("2. Calcular Fatorial");
            System.out.println("3. Conversor de Unidades");
            System.out.println("4. Conversor de Moedas");
            System.out.println("0. Sair");
            choice = scanner.nextInt();
            
            switch (choice) {
                case 1:
                    simpleCalculator(scanner);
                    break;
                case 2:
                    calculateFactorial(scanner);
                    break;
                case 3:
                    unitConverter(scanner);
                    break;
                case 4:
                    currencyConverter(scanner);
                    break;
                case 0:
                    System.out.println("Saindo...");
                    break;
                default:
                    System.out.println("Opção inválida! Tente novamente.");
            }
        } while (choice != 0);

        scanner.close();
    }

    private static void simpleCalculator(Scanner scanner) {
        System.out.println("Digite o primeiro número:");
        double num1 = scanner.nextDouble();
        System.out.println("Digite a operação (+, -, *, /):");
        char operator = scanner.next().charAt(0);
        System.out.println("Digite o segundo número:");
        double num2 = scanner.nextDouble();

        double result;
        switch (operator) {
            case '+':
                result = num1 + num2;
                break;
            case '-':
                result = num1 - num2;
                break;
            case '*':
                result = num1 * num2;
                break;
            case '/':
                if (num2 != 0) {
                    result = num1 / num2;
                } else {
                    System.out.println("Erro: Divisão por zero!");
                    return;
                }
                break;
            default:
                System.out.println("Operação inválida!");
                return;
        }
        System.out.println("Resultado: " + result);
    }

    private static void calculateFactorial(Scanner scanner) {
        System.out.println("Digite um número inteiro para calcular o fatorial:");
        int number = scanner.nextInt();
        if (number < 0) {
            System.out.println("Número inválido! O fatorial é definido apenas para números não-negativos.");
            return;
        }
        System.out.println("Fatorial de " + number + " é: " + factorial(number));
    }

    private static long factorial(int n) {
        if (n == 0) return 1;
        return n * factorial(n - 1);
    }

    private static void unitConverter(Scanner scanner) {
        System.out.println("Escolha a conversão:");
        System.out.println("1. Celsius para Fahrenheit");
        System.out.println("2. Metros para Quilômetros");
        int choice = scanner.nextInt();

        switch (choice) {
            case 1:
                System.out.println("Digite a temperatura em Celsius:");
                double celsius = scanner.nextDouble();
                double fahrenheit = (celsius * 9/5) + 32;
                System.out.println(celsius + " Celsius é igual a " + fahrenheit + " Fahrenheit.");
                break;
            case 2:
                System.out.println("Digite a distância em metros:");
                double meters = scanner.nextDouble();
                double kilometers = meters / 1000;
                System.out.println(meters + " metros é igual a " + kilometers + " quilômetros.");
                break;
            default:
                System.out.println("Opção inválida!");
        }
    }

    private static void currencyConverter(Scanner scanner) {
        System.out.println("Escolha a conversão:");
        System.out.println("1. USD para EUR");
        System.out.println("2. EUR para USD");
        double conversionRate;

        switch (scanner.nextInt()) {
            case 1:
                System.out.println("Digite o valor em USD:");
                double usd = scanner.nextDouble();
                conversionRate = 0.85; // Taxa de câmbio fictícia
                System.out.println(usd + " USD é igual a " + (usd * conversionRate) + " EUR.");
                break;
            case 2:
                System.out.println("Digite o valor em EUR:");
                double eur = scanner.nextDouble();
                conversionRate = 1.18; // Taxa de câmbio fictícia
                System.out.println(eur + " EUR é igual a " + (eur * conversionRate) + " USD.");
                break;
            default:
                System.out.println("Opção inválida!");
        }
    }
}
