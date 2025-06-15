package jhonatan.placido.dao;

import jhonatan.placido.model.Evento;
import jhonatan.placido.model.Usuario;

import java.util.List;

public interface DaoInterface {

    boolean salvar(Object entity);

    boolean atualizar(Object entity);

    List<Evento> listar();

    List<Usuario> listarUsuario();

    Object buscarPorId(Long id);

    boolean deletar(Long id);
}

