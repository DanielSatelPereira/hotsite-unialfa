package Alfa.Sistemas.gui;

import Alfa.Sistemas.model.Evento;
import Alfa.Sistemas.service.EventoService;

import javax.swing.*;
import javax.swing.event.ListSelectionEvent;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;

public class EventoGui extends JFrame {

    private final EventoService eventoService;

    private JLabel jlID;
    private JTextField tfID;
    private JLabel jlTitulo;
    private JTextField tfTitulo;
    private JLabel jlDescricao;
    private JTextField tfDescricao;
    private JLabel jlData;
    private JTextField tfData;
    private JLabel jlHora;
    private JTextField tfHora;
    private JLabel jlLocal;
    private JTextField tfLocal;

    private JButton btConfirmar;
    private JButton btAlterar;
    private JButton btRemover;
    private JButton btNovo;
    private JTable tbEventos;

    public EventoGui(EventoService eventoService) {
        this.eventoService = eventoService;

        setTitle("Cadastro de Evento");
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
        jlTitulo = new JLabel("Título");
        tfTitulo = new JTextField(20);
        jlDescricao = new JLabel("Descrição");
        tfDescricao = new JTextField(20);
        jlData = new JLabel("Data");
        tfData = new JTextField(20);
        jlHora = new JLabel("Hora");
        tfHora = new JTextField(20);
        jlLocal = new JLabel("Local");
        tfLocal = new JTextField(20);

        btConfirmar = new JButton("Confirmar");
        btConfirmar.addActionListener(this::confirmar);

        btAlterar = new JButton("Alterar");
        btAlterar.setEnabled(false); // Ativado apenas quando algo for selecionado
        btAlterar.addActionListener(this::alterar);

        btRemover = new JButton("Remover");
        btRemover.addActionListener(this::remover);
        btNovo = new JButton("Novo");
        btNovo.addActionListener(this::limparCampos);

        jPanel.add(jlID, guiUtils.montarConstraints(0, 0));
        jPanel.add(tfID, guiUtils.montarConstraints(1, 0));

        jPanel.add(jlTitulo, guiUtils.montarConstraints(0, 1));
        jPanel.add(tfTitulo, guiUtils.montarConstraints(1, 1));

        jPanel.add(jlDescricao, guiUtils.montarConstraints(0, 2));
        jPanel.add(tfDescricao, guiUtils.montarConstraints(1, 2));

        jPanel.add(jlData, guiUtils.montarConstraints(0, 3));
        jPanel.add(tfData, guiUtils.montarConstraints(1, 3));

        jPanel.add(jlHora, guiUtils.montarConstraints(0, 4));
        jPanel.add(tfHora, guiUtils.montarConstraints(1, 4));

        jPanel.add(jlLocal, guiUtils.montarConstraints(0, 5));
        jPanel.add(tfLocal, guiUtils.montarConstraints(1, 5));

        jPanel.add(btNovo, guiUtils.montarConstraints(0, 6));
        jPanel.add(btConfirmar, guiUtils.montarConstraints(1, 6));
        jPanel.add(btAlterar, guiUtils.montarConstraints(2, 6));
        jPanel.add(btRemover, guiUtils.montarConstraints(3, 6));

        return jPanel;
    }

    private JScrollPane montarPainelSaida() {
        tbEventos = new JTable();
        tbEventos.setDefaultEditor(Object.class, null);
        tbEventos.getTableHeader().setReorderingAllowed(false);
        tbEventos.getSelectionModel().addListSelectionListener(this::selecionar);
        tbEventos.setModel(montarTableModel());
        return new JScrollPane(tbEventos);
    }

    private void confirmar(ActionEvent event) {
        Evento evento = new Evento(
                tfTitulo.getText(),
                tfDescricao.getText(),
                tfData.getText(),
                tfHora.getText(),
                tfLocal.getText()
        );

        boolean sucesso = eventoService.salvarBD(evento);

        if (sucesso) {
            JOptionPane.showMessageDialog(this, "Evento salvo com sucesso!");
            limparCampos();
            tbEventos.setModel(montarTableModel());
        } else {
            JOptionPane.showMessageDialog(this, "Erro ao salvar evento!");
        }
    }

    private void alterar(ActionEvent event) {
        if (tfID.getText().isEmpty()) {
            JOptionPane.showMessageDialog(this, "Selecione um evento para alterar.");
            return;
        }

        Evento evento = new Evento(
                tfTitulo.getText(),
                tfDescricao.getText(),
                tfData.getText(),
                tfHora.getText(),
                tfLocal.getText()
        );
        evento.setId(Integer.parseInt(tfID.getText()));

        boolean sucesso = eventoService.atualizarBD(evento);

        if (sucesso) {
            JOptionPane.showMessageDialog(this, "Evento atualizado com sucesso!");
            limparCampos();
            tbEventos.setModel(montarTableModel());
        } else {
            JOptionPane.showMessageDialog(this, "Erro ao atualizar evento!");
        }
    }

    private void remover(ActionEvent event) {
        var opcao = JOptionPane.showConfirmDialog(
                this,
                "Deseja realmente excluir o evento?",
                "Remover Evento",
                JOptionPane.YES_NO_OPTION);

        if (opcao > 0) return;

        eventoService.deletarPorId(Integer.parseInt(tfID.getText()));
        limparCampos();
        tbEventos.setModel(montarTableModel());
    }

    private void limparCampos(ActionEvent event) {
        limparCampos();
    }

    private void limparCampos() {
        tfID.setText(null);
        tfTitulo.setText(null);
        tfDescricao.setText(null);
        tfData.setText(null);
        tfHora.setText(null);
        tfLocal.setText(null);
        btAlterar.setEnabled(false); // Desabilita botão após limpar
    }

    private void selecionar(ListSelectionEvent e) {
        var linha = tbEventos.getSelectedRow();
        if (linha != -1) {
            var evento = eventoService.buscarPorId((Integer) tbEventos.getValueAt(linha, 0));

            tfID.setText(String.valueOf(evento.getId()));
            tfTitulo.setText(evento.getTitulo());
            tfDescricao.setText(evento.getDescricao());
            tfData.setText(evento.getData());
            tfHora.setText(evento.getHora());
            tfLocal.setText(evento.getLocal());

            btAlterar.setEnabled(true); // Habilita botão após selecionar
        }
    }

    private DefaultTableModel montarTableModel() {
        var tableModel = new DefaultTableModel();
        tableModel.addColumn("ID");
        tableModel.addColumn("Título");
        tableModel.addColumn("Descrição");
        tableModel.addColumn("Data");
        tableModel.addColumn("Hora");
        tableModel.addColumn("Local");

        eventoService.listarBD().forEach(e ->
                tableModel.addRow(new Object[]{
                        e.getId(),
                        e.getTitulo(),
                        e.getDescricao(),
                        e.getData(),
                        e.getHora(),
                        e.getLocal()
                })
        );

        return tableModel;
    }
}
