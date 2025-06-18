package Alfa.Sistemas;

import Alfa.Sistemas.gui.PrincipalGui;

import javax.swing.*;


public class Main {
    public static void main(String[] args){
        SwingUtilities.invokeLater(Main::executar);
    }

    private static void executar() {
        var eventoGui = new PrincipalGui();
        eventoGui.setVisible(true);
    }
}