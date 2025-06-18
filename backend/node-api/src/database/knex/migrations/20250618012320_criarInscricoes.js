/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */
exports.up = function(knex) {
    return knex.schema.createTable('inscricoes', (table) => {
            table.increments('id').primary();
            table.integer('raUsuarios').unsigned().notNullable();
            table.integer('idEvento').unsigned().notNullable();
            
            table.foreign('raUsuarios')
                .references('ra')
                .inTable('usuarios')
                .onDelete('CASCADE');
            
            table.foreign('idEvento')
                .references('id')
                .inTable('eventos')
                .onDelete('CASCADE');
                
            table.unique(['raUsuarios', 'idEvento']);
        }
        
        ).then(() => {
            console.log('Tabela inscricoes criada com sucesso!');
        });
};

exports.down = function(knex) {
    return knex.schema.dropTable('inscricoes')
        .then(() => {
            console.log('Tabela inscricoes removida!');
        });
};
