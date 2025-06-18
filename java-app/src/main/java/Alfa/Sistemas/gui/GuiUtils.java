package Alfa.Sistemas.gui;

import java.awt.*;

public class GuiUtils {
    public GridBagConstraints montarConstraints(int x, int y) {
        var constraint = new GridBagConstraints();
        constraint.insets = new Insets(5, 5, 5, 5); // mais espaço
        constraint.gridx = x;
        constraint.gridy = y;
        constraint.fill = GridBagConstraints.HORIZONTAL;
        constraint.weightx = 1;
        return constraint;
    }
}
