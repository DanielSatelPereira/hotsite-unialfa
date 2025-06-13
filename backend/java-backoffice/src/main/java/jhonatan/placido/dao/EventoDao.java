package jhonatan.placido.dao;

import jhonatan.placido.model.Evento;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

public class EventoDao extends Dao implements DaoInterface {

    @Override
    public boolean salvar(Object entity) {
        try {
            var evento = (Evento) entity;

            String sql = "INSERT INTO eventos(titulo, descricao, data, hora, local) VALUES (?, ?, ?, ?, ?)";

            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setString(1, evento.getTitulo());
            ps.setString(2, evento.getDescricao());
            ps.setString(3, evento.getData());
            ps.setString(4, evento.getHora());
            ps.setString(5, evento.getLocal());

            return ps.executeUpdate() > 0;

        } catch (Exception e) {
            System.out.println("Erro ao salvar evento: " + e.getMessage());
            return false;
        }
    }

    @Override
    public boolean atualizar(Object entity) {
        try {
            var evento = (Evento) entity;

            String sql = "UPDATE eventos SET titulo = ?, descricao = ?, data = ?, hora = ?, local = ? WHERE id = ?";

            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setString(1, evento.getTitulo());
            ps.setString(2, evento.getDescricao());
            ps.setString(3, evento.getData());
            ps.setString(4, evento.getHora());
            ps.setString(5, evento.getLocal());
            ps.setInt(6, evento.getId());

            return ps.executeUpdate() > 0;

        } catch (Exception e) {
            System.out.println("Erro ao atualizar evento: " + e.getMessage());
            return false;
        }
    }

    @Override
    public List<Object> listar() {
        List<Evento> eventos = new ArrayList<>();

        try {
            String sql = "SELECT * FROM eventos";
            ResultSet rs = getConnection().prepareStatement(sql).executeQuery();

            while (rs.next()) {
                Evento evento = new Evento(
                        rs.getInt("id"),
                        rs.getString("titulo"),
                        rs.getString("descricao"),
                        rs.getString("data"),
                        rs.getString("hora"),
                        rs.getString("local")
                );
                eventos.add(evento);
            }

            rs.close();

        } catch (Exception e) {
            System.out.println("Erro ao listar eventos: " + e.getMessage());
        }

        return new ArrayList<>(eventos);
    }

    @Override
    public Object buscarPorId(Long id) {
        Evento evento = null;

        try {
            String sql = "SELECT * FROM eventos WHERE id = ?";
            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setLong(1, id);
            ResultSet rs = ps.executeQuery();

            if (rs.next()) {
                evento = new Evento(
                        rs.getInt("id"),
                        rs.getString("titulo"),
                        rs.getString("descricao"),
                        rs.getString("data"),
                        rs.getString("hora"),
                        rs.getString("local")
                );
            }

            rs.close();

        } catch (Exception e) {
            System.out.println("Erro ao buscar evento por ID: " + e.getMessage());
        }

        return evento;
    }

    @Override
    public boolean deletar(Long id) {
        try {
            String sql = "DELETE FROM eventos WHERE id = ?";
            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setLong(1, id);

            return ps.executeUpdate() > 0;

        } catch (Exception e) {
            System.out.println("Erro ao deletar evento: " + e.getMessage());
            return false;
        }
    }
}
