<?php

require_once './src/docs/Cart.php';
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}

$cart = $_SESSION['cart'];

echo "<pre>";
echo "<h1>Casos de Teste</h1>";

$cart = new Cart();
echo "<h2>Caso 1: Adicionar produto válido - adicionar 2 camisetas</h2>";
$result = $cart->addItem(0, 2);

echo "<h3>Resultado:</h3>";
print_r($result);
echo "<h3>Conteúdo do carrinho:</h3>";
print_r($cart->listItems());
echo "<h3>Estoque de camisetas:</h3>";
print_r($cart->getProducts()[0]['estoque']);
echo "<hr>";

$cart = new Cart();
echo "<h2>Caso 2: Adicionar além do estoque - adicionar 10 tênis</h2>";
$result = $cart->addItem(2, 10);

echo "<h3>Resultado:</h3>";
print_r($result);
echo "<h3>Estoque do produto:</h3>";
print_r($cart->getProducts()[2]);
echo "<hr>";

$cart = new Cart();
echo "<h2>Caso 3: Remover produto do carrinho - remover calça jeans</h2>";
$cart->addItem(1, 1);

echo "<h3>Estado inicial do carrinho:</h3>";
print_r($cart->listItems());
echo "<h3>Estoque de calça jeans pré remoção:</h3>";
print_r($cart->getProducts()[1]['estoque']);

$result = $cart->removeItem(1);
echo "<h3>Resultado:</h3>";
print_r($result);
echo "<h3>Estado final do carrinho:</h3>";
print_r($cart->listItems());
echo "<h3>Estoque de calça jeans após remoção:</h3>";
print_r($cart->getProducts()[1]['estoque']);
echo "<hr>";

$cart = new Cart();
echo "<h2>Caso 4: Aplicação de cupom de desconto</h2>";
$cart->addItem(0, 2);
$cart->addItem(1, 1);

echo "<h3>Total antes do desconto:</h3>";
print_r($cart->total());

$result = $cart->applyDiscount('DESCONTO10');
echo "<h3>Resultado:</h3>";
print_r($result);
echo "<hr>";

$cart = new Cart();
echo "<h2>Caso 5: Teste de Subtotal com 3 Produtos</h2>";
$cart->addItem(0, 2);
$cart->addItem(1, 1);
$cart->addItem(2, 1);

echo "<h3>Conteúdo do carrinho:</h3>";
print_r($cart->listItems());
echo "<h3>Total final do carrinho:</h3>";
print_r($cart->total());
echo "<hr>";

echo "</pre>";
