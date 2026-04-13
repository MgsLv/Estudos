import java.sql.*;
import javax.swing.*;
public class ConsultaFilmes {
    public static void main(String[] args){
        // Caixa de execução

        final String DRIVER = "com.mysql.jdbc.Driver";
        /* Declara uma variável String constante chamada DRIVER que
        contém o nome do servidor para a conexão com o banco da dados
        */

        final String URL = "jdbc:mysql://localhost:3306/dados";
        /* Declara uma variável String constante chamada URL quem
        contém o encereço em que o banco está localizado(localhost),
        a porta de comunicação do MySQL(3306) e o nome do banco de dados(dados)
        */

        try {
            Class.forName(DRIVER);
            // Comando Class.forName carrega o driver que será usado para a comunicação com o banco de dados

            Connection connection = DriverManager.getConnection(URL, "root", "");
            /* Objeto connection(conexão) estabelece a conexão com o banco usando a String URL(usuário "root" 
            e senha "", padrão do xampp)
            */
            
            String sql = "SELECT codigo, título FROM Filmes WHERE codigo > ? ORDER BY codigo";
            PreparedStatement statement = connection.prepareStatement(sql);
            statement.setString(1, "03120");
            statement.setString(2, "03140");
            ResultSet resultSet = statement.executeQuery();
            /* Cria um objeto resultSet da interface resultset para armazenar o resultado do sripts SQl pelo
            método executeQuery
            */
            System.out.println("CÓDIGO  TÍTULO");
            while (resultSet.next()) {
                String codigo = resultSet.getString("codigo");
                String titulo = resultSet.getString("titulo");
                System.out.println(codigo + "    " + titulo);
            }
            resultSet.close();
            statement.close();
            connection.close();
        } catch (ClassNotFoundException erro) {
            JOptionPane.showMessageDialog(null, "Driver não encontrado!\n"
                    + erro.toString());
        } catch (SQLException erro) {
            JOptionPane.showMessageDialog(null, "Problemas na conexão com a fonte de dados.\n"
                    + erro.toString());
        }
    }
}
