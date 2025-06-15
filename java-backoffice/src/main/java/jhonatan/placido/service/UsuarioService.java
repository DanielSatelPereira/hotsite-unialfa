package jhonatan.placido.service;

import jhonatan.placido.dao.UsuarioDao;
import jhonatan.placido.model.Usuario;
import java.util.List;

public class UsuarioService {

    public boolean salvarBD(Usuario usuario) {
        var dao = new UsuarioDao();
        return dao.salvar(usuario);
    }

    public List<Usuario> listarBD() {
        var dao = new UsuarioDao();
        return dao.listarUsuario();
    }

    public boolean deletarPorId(int id) {
        var dao = new UsuarioDao();
        return dao.deletar((long) id);
    }

    public Usuario buscarPorId(Integer id) {
        var dao = new UsuarioDao();
        return (Usuario) dao.buscarPorId(Long.valueOf(id));
    }

    public boolean atualizarBD(Usuario usuario) {
        var dao = new UsuarioDao();
        return dao.atualizar(usuario);
    }
}
