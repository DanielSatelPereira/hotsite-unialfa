/**
 * Formata respostas da API de forma consistente
 * @param success Indica se a requisição foi bem sucedida
 * @param data Dados da resposta
 * @param error Mensagem de erro (opcional)
 */
export const formatResponse = (success: boolean, data: any, error?: string) => ({
    success,
    data,
    ...(error && { error }),
    timestamp: new Date().toISOString()
});