public class ContadorForWhile {
    public static void main(String[] args) {

        int sPares = 0;
        int sImpares = 0;

        for (int nmb = 1; nmb <= 100; nmb++) {
            if (nmb % 2 == 0){
                sPares += nmb;
            } else {
                sImpares += nmb;
            }
        }

        int cont = 1;
        System.out.print("Soma dos números pares: ");
        while (cont <= 100) {
            if (cont % 2 == 0) {
                System.out.print(cont + " ");
            }

            cont++;
        }
        System.out.println("Números pares somados: " + sPares);

        cont = 1;
        System.out.print("Soma dos números ímpares: ");
        while (cont <= 100) {
            if (cont % 2 != 0) {
                System.out.print(cont + " ");
            }
            cont++;
        }
        System.out.println("Soma dos números Ímpares: " + sImpares );

        if (sPares > sImpares){
            System.out.println("A soma dos números pares é maior.");
        } else {
            System.out.println("A soma dos números ímpares é maior.");
        }
    }
}
