# PRD - Carrinho de Compras

**Projeto:** Sistema de Carrinho de Compras em PHP  
**Autor:** Rodrigo Shinji Yamashita  
**RA:** 2001443  

---

## 📌 Instruções de Execução
Este projeto foi desenvolvido em **PHP puro** e deve ser executado em um ambiente local, como o **XAMPP**.

---

## ▶️ Como Rodar
1. Certifique-se de que o **Apache** e o **MySQL** estão ativos no XAMPP.  
2. Clrie uma pasta `cart` dentro do `htdocs` e clone o repositório para dentro dela.  
3. Abra o navegador e acesse:  
http://localhost/cart
4. O arquivo `index.php` executará automaticamente os casos de teste e exibirá os resultados.  

---

## 📖 Funcionalidades Implementadas
O sistema oferece as seguintes funcionalidades principais:

- **Adicionar Item**: Inclui um produto no carrinho. Caso já exista, apenas a quantidade é atualizada.  
- **Remover Item**: Remove um item do carrinho e devolve a quantidade ao estoque.  
- **Listar Itens**: Retorna todos os itens presentes no carrinho.  
- **Calcular Total**: Soma os subtotais de todos os itens.  
- **Aplicar Desconto**: Aplica 10% de desconto ao utilizar o cupom `DESCONTO10`.  
- **Recalcular Item**: Atualiza o subtotal sempre que a quantidade é alterada.  

---

## ⚖️ Regras de Negócio e Validações
- Não é possível adicionar um produto inexistente no catálogo.  
- A quantidade deve ser sempre positiva (maior que zero).  
- Não é permitido adicionar quantidade superior ao estoque disponível.  
- O estoque é atualizado automaticamente ao adicionar ou remover itens.  
- O desconto só é aplicado com cupom válido (`DESCONTO10`).  

---

## ⚠️ Limitações
- **Cupom fixo**: Apenas o cupom `DESCONTO10` está disponível (definido no código).   
- **Tratamento de erros simples**: Mensagens de erro são apenas textuais.   

---

## 🧪 Exemplos de Uso (Casos de Teste)
O arquivo `index.php` demonstra os seguintes cenários:

### Caso 1: Adicionar Produto Válido
- **Entrada**: produto `id=0`, quantidade `2`.  
- **Resultado**: Produto adicionado e estoque atualizado.  

### Caso 2: Adicionar Além do Estoque
- **Entrada**: produto `id=2`, quantidade `10`.  
- **Resultado**: Exibe erro **"Estoque insuficiente."**  

### Caso 3: Remover Produto
- **Entrada**: produto `id=1`.  
- **Resultado**: Produto removido e estoque restaurado.  

### Caso 4: Aplicação de Desconto
- **Entrada**: cupom `DESCONTO10`.  
- **Resultado**: Total do carrinho reduzido em 10%.  

### Caso 5: Subtotal por Produto
- **Entrada**: 3 produtos com diferentes quantidades.  
- **Resultado**: Cada subtotal calculado corretamente e total final como soma dos subtotais.  
