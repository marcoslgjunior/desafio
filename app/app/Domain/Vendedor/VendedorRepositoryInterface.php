<?php

namespace App\Domain\Vendedor;

use App\Domain\Vendedor\Vendedor;

interface VendedorRepositoryInterface
{
    public function buscarVendedorExistente(string $nome, string $email): ?Vendedor;

    public function buscarVendedorPorId(int $id): ?Vendedor;

    public function retornarTodosVendedores();
}