package jhonatan.placido.gui;

import jhonatan.placido.dao.EventoDao;
import jhonatan.placido.model.Evento;
import jhonatan.placido.service.EventoService;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class EventoGui extends JFrame {

    private JTextField txtTitulo = new JTextField();
    private JTextArea txtDescricao = new JTextArea();
    private JTextField txtData = new JTextField();
    private JTextField txtHora = new JTextField();
    private JTextField txtLocal = new JTextField();
    private JButton btnSalvar = new JButton("Salvar");

    public EventoGui(EventoService connection) {
        setTitle("Cadastro de Evento");
        setSize(400, 400);
        setLayout(null);

        JLabel lblTitulo = new JLabel("Título:");
        JLabel lblDescricao = new JLabel("Descrição:");
        JLabel lblData = new JLabel("Data (YYYY-MM-DD):");
        JLabel lblHora = new JLabel("Hora (HH:MM):");
        JLabel lblLocal = new JLabel("Local:");

        lblTitulo.setBounds(20, 20, 100, 20);
        txtTitulo.setBounds(150, 20, 200, 20);

        lblDescricao.setBounds(20, 60, 100, 20);
        txtDescricao.setBounds(150, 60, 200, 60);

        lblData.setBounds(20, 140, 130, 20);
        txtData.setBounds(150, 140, 200, 20);

        lblHora.setBounds(20, 180, 130, 20);
        txtHora.setBounds(150, 180, 200, 20);

        lblLocal.setBounds(20, 220, 100, 20);
        txtLocal.setBounds(150, 220, 200, 20);

        btnSalvar.setBounds(150, 270, 100, 30);

        add(lblTitulo); add(txtTitulo);
        add(lblDescricao); add(txtDescricao);
        add(lblData); add(txtData);
        add(lblHora); add(txtHora);
        add(lblLocal); add(txtLocal);
        add(btnSalvar);

        btnSalvar.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                Evento evento = new Evento(
                        txtTitulo.getText(),
                        txtDescricao.getText(),
                        txtData.getText(),
                        txtHora.getText(),
                        txtLocal.getText()
                );
                EventoDao dao = new EventoDao();
                if (dao.salvar(evento)) {
                    JOptionPane.showMessageDialog(null, "Evento salvo com sucesso!");
                } else {
                    JOptionPane.showMessageDialog(null, "Erro ao salvar evento.");
                }
            }
        });

        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setVisible(true);
    }

}