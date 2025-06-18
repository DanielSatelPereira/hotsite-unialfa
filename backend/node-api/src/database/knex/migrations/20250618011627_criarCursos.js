/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */

exports.up = function(knex) {
  return knex.schema.createTable('cursos', (table) => {
    table.increments('id').primary();
    table.string('nome', 100).notNullable();
  })
  .then(() => console.log('Tabela cursos criada com sucesso!'));
};

exports.down = function(knex) {
  return knex.schema.dropTable('cursos')
    .then(() => console.log('Tabela cursos removida!'));
};