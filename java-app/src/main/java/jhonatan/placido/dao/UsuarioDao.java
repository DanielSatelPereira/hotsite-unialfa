package jhonatan.placido.dao;

import jhonatan.placido.model.Evento;
import jhonatan.placido.model.Usuario;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

public class UsuarioDao extends Dao implements DaoInterface {

    @Override
    public boolean salvar(Object entity) {
        try {
            var usuario = (Usuario) entity;
            String sql = "INSERT INTO usuarios(ra, nome, email, senha, tipo) VALUES (?, ?, ?, ?, ?)";
            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setInt(1, usuario.getRa());
            ps.setString(2, usuario.getNome());
            ps.setString(3, usuario.getEmail());
            ps.setString(4, usuario.getSenha());
            ps.setInt(5, usuario.getTipo());
            return ps.executeUpdate() > 0;
        } catch (Exception e) {
            System.out.println("Erro ao salvar usuário: " + e.getMessage());
            return false;
        }
    }

    @Override
    public boolean atualizar(Object entity) {
        try {
            var usuario = (Usuario) entity;
            String sql = "UPDATE usuarios SET ra = ?, nome = ?, email = ?, senha = ?, tipo = ? WHERE id = ?";
            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setInt(1, usuario.getRa());
            ps.setString(2, usuario.getNome());
            ps.setString(3, usuario.getEmail());
            ps.setString(4, usuario.getSenha());
            ps.setInt(5, usuario.getTipo());
            ps.setInt(6, usuario.getId());
            return ps.executeUpdate() > 0;
        } catch (Exception e) {
            System.out.println("Erro ao atualizar usuário: " + e.getMessage());
            return false;
        }
    }

    @Override
    public List<Evento> listar() {
        return List.of();
    }

    @Override
    public List<Usuario> listarUsuario() {
        List<Usuario> usuarios = new ArrayList<>();
        try {
            String sql = "SELECT * FROM usuarios";
            ResultSet rs = getConnection().prepareStatement(sql).executeQuery();
            while (rs.next()) {
                Usuario usuario = new Usuario(
                        rs.getInt("id"),
                        rs.getInt("ra"),
                        rs.getString("nome"),
                        rs.getString("email"),
                        rs.getString("senha"),
                        rs.getInt("tipo")
                );
                usuarios.add(usuario);
            }
            rs.close();
        } catch (Exception e) {
            System.out.println("Erro ao listar usuários: " + e.getMessage());
        }
        return usuarios;
    }

    @Override
    public Object buscarPorId(Long id) {
        Usuario usuario = null;
        try {
            String sql = "SELECT * FROM usuarios WHERE id = ?";
            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setLong(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                usuario = new Usuario(
                        rs.getInt("id"),
                        rs.getInt("ra"),
                        rs.getString("nome"),
                        rs.getString("email"),
                        rs.getString("senha"),
                        rs.getInt("tipo")
                );
            }
            rs.close();
        } catch (Exception e) {
            System.out.println("Erro ao buscar usuário por ID: " + e.getMessage());
        }
        return usuario;
    }

    @Override
    public boolean deletar(Long id) {
        try {
            String sql = "DELETE FROM usuarios WHERE id = ?";
            PreparedStatement ps = getConnection().prepareStatement(sql);
            ps.setLong(1, id);
            return ps.executeUpdate() > 0;
        } catch (Exception e) {
            System.out.println("Erro ao deletar usuário: " + e.getMessage());
            return false;
        }
    }
}
