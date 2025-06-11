package Eventos.Palestra;

import Eventos.Palestra.Gui.EventoGui;

import javax.swing.*;
import java.sql.Connection;
import java.sql.DriverManager;

import static java.text.Collator.PRIMARY;

public class Main {
    public static void main(String[] args) {
        try {
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/sistema_ies", "root", "senha");
            SwingUtilities.invokeLater(() -> new EventoGui(conn).setVisible(true));
        } catch (Exception e) {
            e.printStackTrace();
            JOptionPane.showMessageDialog(null, "Erro na conexão com o banco de dados: " + e.getMessage());
        }
    }
}

