/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */

exports.up = function(knex) {
    return knex.schema.createTable('usuarios', (table) => {
        table.increments('id').primary();
        table.integer('ra', 13).unique();
        table.string('nome', 100).notNullable();
        table.string('email', 100).notNullable();
        table.string('senha', 50).notNullable();
        table.integer('tipo', 11).notNullable().defaultTo(2);
    })
    .then(() => console.log('Tabela usuarios criada com sucesso!'));
};

exports.down = function(knex) {
  return knex.schema.dropTable('usuarios')
    .then(() => console.log('Tabela usuarios removida!'));
};