# PRD-Carrinho-de-compras

Projeto: Sistema de Carrinho de Compras em PHP

Nome: Rodrigo Shinji Yamashita
RA: 2001443

Instruções de Execução
Este projeto foi desenvolvido em PHP puro e é ideal para ser executado em um ambiente local como o XAMPP.

Estrutura de Pastas
Para rodar o projeto, organize os arquivos da seguinte forma na pasta htdocs do seu XAMPP:

carrinho/
├── src/
│   └── Cart.php
├── docs/
│   └── README.md
└── index.php
src/: Contém o arquivo da classe Cart.php.

docs/: Contém este arquivo de documentação.

index.php: É o arquivo principal que inicia o sistema e executa os testes.

Como Rodar
Certifique-se de que o Apache e o MySQL estão rodando no seu XAMPP.

Copie os arquivos Cart.php e index.php para a pasta carrinho/ dentro de htdocs.

Abra seu navegador e acesse a URL: http://localhost/carrinho.

A página index.php irá executar automaticamente todos os casos de teste e exibir os resultados na tela, validando as funcionalidades do carrinho.

Breve Documentação
Funcionalidades Implementadas
O sistema de carrinho de compras oferece as seguintes funcionalidades principais:

Adicionar Item: Adiciona um produto ao carrinho. Se o item já existir, apenas sua quantidade é atualizada.

Remover Item: Remove um item completo do carrinho e devolve a quantidade para o estoque.

Listar Itens: Retorna uma lista de todos os itens atualmente no carrinho.

Calcular Total: Soma os subtotais de todos os itens para obter o valor total do carrinho.

Aplicar Desconto: Aplica um desconto de 10% no valor total do carrinho ao usar o cupom DESCONTO10.

Recálculo de Item: Recalcula o subtotal de um item do carrinho sempre que sua quantidade é alterada.

Regras de Negócio e Validações
O sistema de carrinho segue as seguintes regras de negócio para garantir a integridade dos dados:

Não é possível adicionar um produto que não existe no catálogo.

A quantidade adicionada deve ser um número positivo (maior que zero).

Não é possível adicionar uma quantidade maior do que a disponível em estoque.

A remoção de um item só ocorre se ele estiver presente no carrinho.

O estoque do produto é atualizado automaticamente ao adicionar ou remover itens do carrinho.

O desconto só é aplicado se o cupom for válido (DESCONTO10).

Limitações
A versão atual do projeto possui as seguintes limitações:

Cupom Fixo: O sistema suporta apenas um cupom de desconto único e "hardcoded" (definido no código).

Sem Persistência de Dados: Os dados dos produtos e o estado do carrinho são mantidos em arrays e na sessão, não sendo persistidos em um banco de dados.

Tratamento de Erros Simples: As mensagens de erro são textuais e não há um sistema robusto de tratamento de exceções.

Métodos Ineficientes: As funções removeItem e listItems utilizam a iteração foreach para manipular arrays, o que pode ser menos performático do que o uso das funções nativas do PHP como unset() e array_values().

Exemplos de Uso (Casos de Teste)
O arquivo index.php demonstra todos os casos de uso em um ambiente controlado. Ao acessá-lo no navegador, você verá a saída para cada teste.

Caso 1: Adicionar Produto Válido
Entrada: produto id=1, quantidade 2.

Resultado Esperado: O produto é adicionado ao carrinho, e o estoque do produto 1 é atualizado.

Caso 2: Adicionar Além do Estoque
Entrada: produto id=3, quantidade 10.

Resultado Esperado: Uma mensagem de erro: "Estoque insuficiente."

Caso 3: Remover Produto
Entrada: produto id=2.

Resultado Esperado: O produto é removido do carrinho, e o estoque original é restaurado.

Caso 4: Aplicação de Desconto
Entrada: cupom DESCONTO10.

Resultado Esperado: O valor total do carrinho é reduzido em 10%.

Caso 5: Teste de Subtotal
Entrada: 3 produtos com diferentes quantidades.

Resultado Esperado: Cada item no carrinho exibe seu subtotal calculado corretamente, e o valor total do carrinho é a soma de todos os subtotais.
