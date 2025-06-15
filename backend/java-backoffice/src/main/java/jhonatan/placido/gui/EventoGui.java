import java.awt.event.ActionEvent;

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
