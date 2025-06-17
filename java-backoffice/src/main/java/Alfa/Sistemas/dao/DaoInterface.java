package Alfa.Sistemas.dao;

import Alfa.Sistemas.model.Evento;
import Alfa.Sistemas.model.Usuario;

import java.util.List;

public interface DaoInterface {

    boolean salvar(Object entity);

    boolean atualizar(Object entity);

    List<Evento> listar();

    List<Usuario> listarUsuario();

    Object buscarPorId(Long id);

    boolean deletar(Long id);
}

