package Eventos.Palestra.Dao;

import Eventos.Palestra.Model.Evento;

import java.sql.SQLException;
import java.util.List;

public interface DaoInterface<E> {
    void salvar(Evento evento) throws SQLException;

    List<Evento> listar() throws SQLException;
}
