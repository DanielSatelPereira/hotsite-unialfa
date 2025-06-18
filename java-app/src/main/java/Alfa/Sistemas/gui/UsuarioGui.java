package Alfa.Sistemas.gui;

import Alfa.Sistemas.model.Usuario;
import Alfa.Sistemas.service.UsuarioService;

import javax.swing.*;
import javax.swing.event.ListSelectionEvent;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;

public class UsuarioGui extends JFrame {

    private final UsuarioService usuarioService;

    private JLabel jlID;
    private JTextField tfID;
    private JLabel jlRA;
    private JTextField tfRA;
    private JLabel jlNome;
    private JTextField tfNome;
    private JLabel jlEmail;
    private JTextField tfEmail;
    private JLabel jlSenha;
    private JTextField tfSenha;
    private JLabel jlTipo;
    private JTextField tfTipo;

    private JButton btConfirmar;
    private JButton btAlterar;
    private JButton btRemover;
    private JButton btNovo;
    private JTable tbUsuarios;

    public UsuarioGui(UsuarioService usuarioService) {
        this.usuarioService = usuarioService;

        setTitle("Cadastro de Usuário");
        setSize(850, 400);
        setLocationRelativeTo(null);

        getContentPane().add(montarPainelEntrada(), BorderLayout.NORTH);
        getContentPane().add(montarPainelSaida(), BorderLayout.CENTER);
    }

    private JPanel montarPainelEntrada() {
        var jPanel = new JPanel(new GridBagLayout());
        var guiUtils = new GuiUtils();

        jlID = new JLabel("ID");
        tfID = new JTextField(20);
        tfID.setEditable(false);

        jlRA = new JLabel("RA");
        tfRA = new JTextField(20);

        jlNome = new JLabel("Nome");
        tfNome = new JTextField(20);

        jlEmail = new JLabel("Email");
        tfEmail = new JTextField(20);

        jlSenha = new JLabel("Senha");
        tfSenha = new JTextField(20);

        jlTipo = new JLabel("Tipo");
        tfTipo = new JTextField(20);

        btConfirmar = new JButton("Confirmar");
        btConfirmar.addActionListener(this::confirmar);

        btAlterar = new JButton("Alterar");
        btAlterar.setEnabled(false);
        btAlterar.addActionListener(this::alterar);

        btRemover = new JButton("Remover");
        btRemover.addActionListener(this::remover);

        btNovo = new JButton("Novo");
        btNovo.addActionListener(this::limparCampos);

        jPanel.add(jlID, guiUtils.montarConstraints(0, 0));
        jPanel.add(tfID, guiUtils.montarConstraints(1, 0));

        jPanel.add(jlRA, guiUtils.montarConstraints(0, 1));
        jPanel.add(tfRA, guiUtils.montarConstraints(1, 1));

        jPanel.add(jlNome, guiUtils.montarConstraints(0, 2));
        jPanel.add(tfNome, guiUtils.montarConstraints(1, 2));

        jPanel.add(jlEmail, guiUtils.montarConstraints(0, 3));
        jPanel.add(tfEmail, guiUtils.montarConstraints(1, 3));

        jPanel.add(jlSenha, guiUtils.montarConstraints(0, 4));
        jPanel.add(tfSenha, guiUtils.montarConstraints(1, 4));

        jPanel.add(jlTipo, guiUtils.montarConstraints(0, 5));
        jPanel.add(tfTipo, guiUtils.montarConstraints(1, 5));

        jPanel.add(btNovo, guiUtils.montarConstraints(0, 6));
        jPanel.add(btConfirmar, guiUtils.montarConstraints(1, 6));
        jPanel.add(btAlterar, guiUtils.montarConstraints(2, 6));
        jPanel.add(btRemover, guiUtils.montarConstraints(3, 6));

        return jPanel;
    }

    private JScrollPane montarPainelSaida() {
        tbUsuarios = new JTable();
        tbUsuarios.setDefaultEditor(Object.class, null);
        tbUsuarios.getTableHeader().setReorderingAllowed(false);
        tbUsuarios.getSelectionModel().addListSelectionListener(this::selecionar);
        tbUsuarios.setModel(montarTableModel());
        return new JScrollPane(tbUsuarios);
    }

    private void confirmar(ActionEvent event) {
        Usuario usuario = new Usuario(
                Integer.parseInt(tfRA.getText()),
                tfNome.getText(),
                tfEmail.getText(),
                tfSenha.getText(),
                Integer.parseInt(tfTipo.getText())
        );

        boolean sucesso = usuarioService.salvarBD(usuario);

        if (sucesso) {
            JOptionPane.showMessageDialog(this, "Usuário salvo com sucesso!");
            limparCampos();
            tbUsuarios.setModel(montarTableModel());
        } else {
            JOptionPane.showMessageDialog(this, "Erro ao salvar usuário!");
        }
    }

    private void alterar(ActionEvent event) {
        if (tfID.getText().isEmpty()) {
            JOptionPane.showMessageDialog(this, "Selecione um usuário para alterar.");
            return;
        }

        Usuario usuario = new Usuario(
                Integer.parseInt(tfRA.getText()),
                tfNome.getText(),
                tfEmail.getText(),
                tfSenha.getText(),
                Integer.parseInt(tfTipo.getText())
        );
        usuario.setId(Integer.parseInt(tfID.getText()));

        boolean sucesso = usuarioService.atualizarBD(usuario);

        if (sucesso) {
            JOptionPane.showMessageDialog(this, "Usuário atualizado com sucesso!");
            limparCampos();
            tbUsuarios.setModel(montarTableModel());
        } else {
            JOptionPane.showMessageDialog(this, "Erro ao atualizar usuário!");
        }
    }

    private void remover(ActionEvent event) {
        var opcao = JOptionPane.showConfirmDialog(
                this,
                "Deseja realmente excluir o usuário?",
                "Remover Usuário",
                JOptionPane.YES_NO_OPTION);

        if (opcao > 0) return;

        usuarioService.deletarPorId(Integer.parseInt(tfID.getText()));
        limparCampos();
        tbUsuarios.setModel(montarTableModel());
    }

    private void limparCampos(ActionEvent event) {
        limparCampos();
    }

    private void limparCampos() {
        tfID.setText(null);
        tfRA.setText(null);
        tfNome.setText(null);
        tfEmail.setText(null);
        tfSenha.setText(null);
        tfTipo.setText(null);
        btAlterar.setEnabled(false);
    }

    private void selecionar(ListSelectionEvent e) {
        var linha = tbUsuarios.getSelectedRow();
        if (linha != -1) {
            var usuario = usuarioService.buscarPorId((Integer) tbUsuarios.getValueAt(linha, 0));

            tfID.setText(String.valueOf(usuario.getId()));
            tfRA.setText(String.valueOf(usuario.getRa()));
            tfNome.setText(usuario.getNome());
            tfEmail.setText(usuario.getEmail());
            tfSenha.setText(usuario.getSenha());
            tfTipo.setText(String.valueOf(usuario.getTipo()));

            btAlterar.setEnabled(true);
        }
    }

    private DefaultTableModel montarTableModel() {
        var tableModel = new DefaultTableModel();
        tableModel.addColumn("ID");
        tableModel.addColumn("RA");
        tableModel.addColumn("Nome");
        tableModel.addColumn("Email");
        tableModel.addColumn("Senha");
        tableModel.addColumn("Tipo");

        usuarioService.listarBD().forEach(u ->
                tableModel.addRow(new Object[]{
                        u.getId(),
                        u.getRa(),
                        u.getNome(),
                        u.getEmail(),
                        u.getSenha(),
                        u.getTipo()
                })
        );

        return tableModel;
    }
}
