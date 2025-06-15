package jhonatan.placido.service;

import jhonatan.placido.dao.EventoDao;
import jhonatan.placido.model.Evento;

import java.util.List;

public class EventoService {

    public boolean salvarBD(Evento evento) {
        var dao = new EventoDao();
        return dao.salvar(evento);
    }

    public List<Evento> listarBD() {
        var dao = new EventoDao();
        return dao.listar(); // agora diretamente como List<Evento>
    }

    public boolean deletarPorId(int id) {
        var dao = new EventoDao();
        return dao.deletar((long) id);
    }

    public Evento buscarPorId(Integer id) {
        var dao = new EventoDao();
        return (Evento) dao.buscarPorId(Long.valueOf(id));
    }

    public boolean atualizarBD (Evento evento){
        var dao = new EventoDao();
        return dao.atualizar(evento);
    }
}
