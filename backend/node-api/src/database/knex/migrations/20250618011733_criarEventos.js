/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */
exports.up = function(knex) {
    return knex.schema.createTable('eventos', (table) => {
        table.increments('id').primary();
        table.string('titulo', 100).notNullable();
        table.text('descricao');
        table.date('data');
        table.time('hora');
        table.string('local', 100);

        table.integer('idCurso')
            .unsigned()
            .references('id')
            .inTable('cursos')
            .onDelete('CASCADE')

        table.integer('idUsuarios')
            .unsigned()
            .references('id')
            .inTable('usuarios')
            .onDelete('CASCADE')

    })
    .then(() => console.log('Tabela eventos criada com sucesso!'))
};

exports.down = function(knex) {
    return knex.schema.dropTable('cursos')
        .then(() => console.log('Tabela cursos removida!'));
};