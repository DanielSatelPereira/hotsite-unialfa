package Eventos.Palestra.Gui;

import Eventos.Palestra.Model.Evento;
import Eventos.Palestra.services.EventoService;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.sql.Connection;
import java.util.List;

public class EventoGui extends JFrame {
    private JTextField txtNome = new JTextField(20);
    private JTextField txtData = new JTextField(10);
    private JTextField txtLocal = new JTextField(20);
    private JTextArea txtDescricao = new JTextArea(4, 20);
    private JTable tabela;
    private DefaultTableModel modeloTabela;
    private EventoService service;

    public EventoGui(Connection conn) {
        this.service = new EventoService(conn);

        setTitle("Gestão de Eventos - Back Office");
        setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        setSize(600, 400);
        setLayout(new BorderLayout());

        JPanel painelCampos = new JPanel(new GridLayout(5, 2));
        painelCampos.add(new JLabel("Nome:"));
        painelCampos.add(txtNome);
        painelCampos.add(new JLabel("Data:"));
        painelCampos.add(txtData);
        painelCampos.add(new JLabel("Local:"));
        painelCampos.add(txtLocal);
        painelCampos.add(new JLabel("Descrição:"));
        painelCampos.add(new JScrollPane(txtDescricao));

        JButton btnSalvar = new JButton("Salvar Evento");
        btnSalvar.addActionListener(e -> {
            try {
                Evento evento = new Evento(0, txtNome.getText(), txtData.getText(), txtLocal.getText(), txtDescricao.getText());
                service.cadastrar(evento);
                JOptionPane.showMessageDialog(this, "Evento salvo com sucesso!");
                atualizarTabela();
            } catch (Exception ex) {
                JOptionPane.showMessageDialog(this, "Erro ao salvar evento: " + ex.getMessage());
            }
        });

        modeloTabela = new DefaultTableModel(new String[]{"ID", "Nome", "Data", "Local", "Descrição"}, 0);
        tabela = new JTable(modeloTabela);

        add(painelCampos, BorderLayout.NORTH);
        add(btnSalvar, BorderLayout.CENTER);
        add(new JScrollPane(tabela), BorderLayout.SOUTH);

        atualizarTabela();
        setLocationRelativeTo(null);
    }

    private void atualizarTabela() {
        try {
            List<Evento> eventos = service.listarTodos();
            modeloTabela.setRowCount(0);
            for (Evento e : eventos) {
                modeloTabela.addRow(new Object[]{e.getId(), e.getNome(), e.getData(), e.getLocal(), e.getDescricao()});
            }
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(this, "Erro ao carregar eventos: " + ex.getMessage());
        }
    }
}
