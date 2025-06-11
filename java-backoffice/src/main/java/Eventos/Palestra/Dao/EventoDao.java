package Eventos.Palestra.Dao;

import Eventos.Palestra.Model.Evento;

import java.sql.*;
import java.util.*;

public class EventoDao implements DaoInterface<Evento> {
    private Connection conn;

    public EventoDao(Connection conn) {
        this.conn = conn;
    }

    @Override
    public void salvar(Evento evento) throws SQLException {
        String sql = "INSERT INTO eventos (nome, data, local, descricao) VALUES (?, ?, ?, ?)";
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setString(1, evento.getNome());
        stmt.setString(2, evento.getData());
        stmt.setString(3, evento.getLocal());
        stmt.setString(4, evento.getDescricao());
        stmt.executeUpdate();
        stmt.close();
    }

    @Override
    public List<Evento> listar() throws SQLException {
        List<Evento> eventos = new ArrayList<>();
        String sql = "SELECT * FROM eventos";
        PreparedStatement stmt = conn.prepareStatement(sql);
        ResultSet rs = stmt.executeQuery();

        while (rs.next()) {
            Evento e = new Evento();
            e.setId(rs.getInt("id"));
            e.setNome(rs.getString("nome"));
            e.setData(rs.getString("data"));
            e.setLocal(rs.getString("local"));
            e.setDescricao(rs.getString("descricao"));
            eventos.add(e);
        }

        rs.close();
        stmt.close();
        return eventos;
    }
}
