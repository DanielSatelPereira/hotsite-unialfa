package jhonatan.placido;

import jhonatan.placido.gui.EventoGui;
import jhonatan.placido.service.EventoService;

import javax.swing.*;


public class Main {
    public static void main(String[] args){
        SwingUtilities.invokeLater(Main::executar);
    }

    private static void executar() {
        var eventoGui = new EventoGui(new EventoService());
        eventoGui.setVisible(true);
    }
}