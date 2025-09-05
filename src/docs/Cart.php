<?php

class Cart
{
    private array $products;
    private array $items = [];

    public function __construct()
    {
        $this->products = [
            ['id' => 1, 'nome' => 'Camiseta', 'preco' => 59.90, 'estoque' => 10],
            ['id' => 2, 'nome' => 'Calça Jeans', 'preco' => 129.90, 'estoque' => 5],
            ['id' => 3, 'nome' => 'Tênis', 'preco' => 199.90, 'estoque' => 3]
        ];
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function addItem(int $productId, int $quantity): array
    {
        if (!isset($this->products[$productId])) {
            return $this->error('Produto não encontrado.');
        }

        if ($quantity <= 0) {
            return $this->error('Quantidade inválida.');
        }

        if ($this->products[$productId]['estoque'] < $quantity) {
            return $this->error('Estoque insuficiente.');
        }

        $this->updateStock($productId, -$quantity);

        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantidade'] += $quantity;
        } else {
            $p = $this->products[$productId];
            $this->items[$productId] = [
                'id_produto' => $p['id'],
                'nome' => $p['nome'],
                'preco' => $p['preco'],
                'quantidade' => $quantity,
                'subtotal' => 0.0,
            ];
        }

        $this->recalculateItem($productId);

        return $this->success('Produto adicionado ao carrinho.');
    }

    public function removeItem(int $productId): array
    {
        if (!$this->checkCartItem($productId)) {
            return $this->error('Produto não localizado.');
        }

        $quantity = $this->items[$productId]['quantidade'];

        $newItems = [];
        foreach ($this->items as $id => $item) {
            if ($id !== $productId) {
                $newItems[$id] = $item;
            }
        }
        $this->items = $newItems;

        $this->updateStock($productId, $quantity);

        return $this->success('Produto removido com sucesso.');
    }

    public function listItems(): array
    {
        $result = [];

        foreach ($this->items as $item) {
            $result[] = $item;
        }
        return $result;
    }

    public function total(): float
    {
        $sum = 0.0;
        foreach ($this->items as $item) {
            $sum += $item['subtotal'];
        }
        return round($sum, 2);
    }

    public function applyDiscount(string $couponCode): array
    {
        if ($couponCode !== 'DESCONTO10') {
            return $this->error('Cupom inválido.');
        }

        $discountedTotal = $this->total() * 0.9;

        return [
            $this->success('Desconto de 10% aplicado com sucesso!'),
            'total' => round($discountedTotal, 2)
        ];
    }

    private function recalculateItem(int $id): void
    {
        if (!$this->checkCartItem($id)) return;
            $this->items[$id]['subtotal'] = round(
            $this->items[$id]['preco'] * $this->items[$id]['quantidade'],2);
    }

    private function checkCartItem(int $productId): bool
    {
        return isset($this->items[$productId]);
    }

    private function updateStock(int $productId, int $quantity): void
    {
        if (isset($this->products[$productId])) {
            $this->products[$productId]['estoque'] += $quantity;
        }
    }

    private function error(string $msg): array
    {
        return ['ok' => false, 'errorMessage' => $msg];
    }

    private function success(string $msg): array
    {
        return ['ok' => true, 'successMessage' => $msg];
    }
}
