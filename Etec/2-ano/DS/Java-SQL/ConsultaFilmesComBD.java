import javax.xml.transform.Result;
import java.sql.*;
public class ConsultaFilmesComBD {
    public static void main(String[] args) {
        BD bd = new BD();
        if (bd.getConnection()) { //Conexão OK
            try {
                String sql = "SELECT codigo, titulo FROM filmes WHERE codigo > ? AND codigo<?"
                        + " ORDER BY cosigo";
                PreparedStatement statement = bd.connection.prepareStatement(sql);
                statement.getString(1, "03120");
                statement.getString(2, "03140");
                ResultSet resultSet = statement.executeQuery();
                System.out.println("CÓDIGO    TÍTULO");
                System.out.println("------    --------------------------------------------");
                while (resultSet.next()) {
                    String codigo = resultSet.getString("codigo");
                    String titulo = resultSet.getString("titulo");
                    System.out.println(codigo + "    " + titulo);
                }
                resultSet.close();
                statement.close();
                bd.close();
            } catch (SQLException erro) {
                System.out.println("Erro ao conectar!");
            }
        } else {
            System.out.println("Erro ao conectar!");
        }
    }
}
