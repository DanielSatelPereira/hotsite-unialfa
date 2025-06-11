package Eventos.Palestra.services;

import Eventos.Palestra.Dao.EventoDao;
import Eventos.Palestra.Model.Evento;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.List;

public class EventoService {
    private EventoDao dao;

    public EventoService(Connection conn) {
        this.dao = new EventoDao(conn);
    }

    public void cadastrar(Evento evento) throws SQLException {
        dao.salvar(evento);
    }

    public List<Evento> listarTodos() throws SQLException {
        return dao.listar();
    }
}