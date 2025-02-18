import java.sql.*;
public class FilmesDAO {
    public Filmes filme;
    public BD bd;
    private PreparedStatement statement;
    private ResultSet resultSet;
    private String men, sql;
    public static final byte INCLUSAO = 1;
    public static final byte ALTERACAO = 2;
    public static final byte EXCLUSAO = 3;

    public FilmesDAO() {
        bd = new BD();
    }
    public boolean localizar() {
        sql = "select * from filmes where codigo = ?";
        try {
            statement = bd.connection.prepareStatement(sql);
            statement.setString(1, filme.getCodigo());
            resultSet = statement.executeQuery();
            resultSet.next();
            filme.setCodigo(resultSet.getString(1));
            filme.setTitulo(resultSet.getString(2));
            filme.setGenero(resultSet.getString(3));
            filme.setProdutora(resultSet.getString(4));
            filme.setDataCompra(resultSet.getString(5));
            return true;
        } catch (SQLException erro) {
            return false;
        }
    }
    public String atualizar(int operacao) {
        men = "Operação realizada com sucesso!";
        try {
            if (operacao == INCLUSAO) {
                sql = "insert into filmes values (?,?,?,?,?)";
                statement = bd.connection.prepareStatement(sql);
                statement.setString(1, filme.getCodigo());
                statement.setString(1, filme.getTitulo());
                statement.setString(1, filme.getGenero());
                statement.setString(1, filme.getProdutora());
                statement.setString(1, filme.getDataCompra());
            } else if (operacao == ALTERACAO) {
                sql = "update filmes set titulo = ?, genero = ?, produtora = ?, " + "datacompra = ? where codigo = ?";
                statement.setString(5, filme.getCodigo());
                statement.setString(5, filme.getTitulo());
                statement.setString(5, filme.getGenero());
                statement.setString(5, filme.getProdutora());
                statement.setString(5, filme.getDataCompra());
            } else if (operacao == EXCLUSAO) {
                sql = "delete from filmes where codigo = ?";
                statement = bd.connection.prepareStatement(sql);
                statement.setString(1, filme.getCodigo());
            }
            if (statement.executeUpdate() == 0) {
                men = "Falha na operação!";
            }
        } catch (SQLException erro) {
            men = "Falha na operação " + erro.toString();
        }
        return men;
    }
}
