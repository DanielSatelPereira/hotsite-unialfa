package Alfa.Sistemas.gui;

import Alfa.Sistemas.service.EventoService;
import Alfa.Sistemas.service.UsuarioService;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;

public class PrincipalGui extends JFrame {

    private JMenuBar menuBar;

    public PrincipalGui() {
        setTitle("Sistema de Eventos");
        setSize(850, 400);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setExtendedState(MAXIMIZED_BOTH);
        setLocationRelativeTo(null);
        setJMenuBar(montarMenuBar());
    }

    private JMenuBar montarMenuBar() {
        menuBar = new JMenuBar();
        menuBar.add(montarMenuCad());
        menuBar.add(montarMenuConfig());
        return menuBar;
    }

    private JMenu montarMenuCad() {
        var menuCad = new JMenu("Cadastros");
        var miEvento = new JMenuItem("Eventos");
        var miUsuario = new JMenuItem("Usuários");

        menuCad.add(miEvento);
        menuCad.add(miUsuario);

        menuCad.setFont(new Font("Arial", Font.BOLD, 14));
        miEvento.setFont(new Font("Arial", Font.PLAIN, 14));
        miUsuario.setFont(new Font("Arial", Font.PLAIN, 14));

        miEvento.addActionListener(this::abrirEventoGui);
        miUsuario.addActionListener(this::abrirUsuarioGui);

        return menuCad;
    }


    private JMenu montarMenuConfig() {
        var menuConfig = new JMenu("Config.");
        var miSobre = new JMenuItem("Sobre");
        var miEquipe = new JMenuItem("Equipe");
        var miSair = new JMenuItem("Sair");

        menuConfig.add(miSobre);
        menuConfig.add(miEquipe);
        menuConfig.addSeparator();
        menuConfig.add(miSair);

        miSair.addActionListener(this::exit);
        miEquipe.addActionListener(this::exibirEquipe);
        miSobre.addActionListener(this::exibirSobre);

        menuConfig.setFont(new Font("Arial", Font.PLAIN, 14));
        miSobre.setFont(new Font("Arial", Font.PLAIN, 14));
        miEquipe.setFont(new Font("Arial", Font.PLAIN, 14));
        miSair.setFont(new Font("Arial", Font.PLAIN, 14));

        return menuConfig;
    }

    private void abrirEventoGui(ActionEvent e) {
        var gui = new EventoGui(new EventoService());
        gui.setVisible(true);
    }

    private void abrirUsuarioGui(ActionEvent e) {
        var gui = new UsuarioGui(new UsuarioService());
        gui.setVisible(true);
    }

    private void exibirSobre(ActionEvent actionEvent) {
        JOptionPane.showMessageDialog(this, """
                Alfa Eventos - Cadastros
                Versão 1.0
                """);
    }

    private void exibirEquipe(ActionEvent actionEvent) {
        JOptionPane.showMessageDialog(this, """
                Equipe de Desenvolvimento:
                -Alexandre Aizono 
                -Daniel Satel Pereira
                -Gabrielle Bonini
                -Jhonatan Placido
                -Leonardo Mirandola Bernardo
                """);
    }

    private void exit(ActionEvent actionEvent) {
        var result = JOptionPane.showConfirmDialog(
                this,
                "Deseja realmente sair?",
                "Finalizar Aplicação",
                JOptionPane.YES_NO_OPTION
        );

        if (result == JOptionPane.YES_OPTION) {
            System.exit(0);
        }
    }
}
