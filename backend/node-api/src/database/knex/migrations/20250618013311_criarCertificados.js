/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */
exports.up = function(knex) {
    return knex.schema.createTable(
        'certificados',
        (table) => {
            table.increments('id').primary();
            table.integer('idInscricao')
                .unsigned()
                .references('id')
                .inTable('inscricoes')
                .onDelete('CASCADE')
                .unique();
        }
    ).then(() => {
        console.log('Tabela certificados criada com sucesso!');
    });
};

exports.down = function(knex) {
    return knex.schema.dropTable('certificados')
        .then(() => {
            console.log('Tabela certificados removida!');
        });
};
