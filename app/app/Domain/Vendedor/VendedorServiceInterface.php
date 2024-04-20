<?php

namespace App\Domain\Vendedor;

use App\Domain\Venda\Venda;
use App\Domain\Vendedor\Vendedor;
use App\Domain\Vendedor\DtoCriarVendedor;

interface VendedorServiceInterface
{
    public function criarVendedor(DtoCriarVendedor $dtoCriarVendedor): Vendedor;

    /**
     * @return Vendedor[]|null
     */
    public function retornarTodosVendedores();

    public function calculaComissaoVendedor(Vendedor $vendedor): float;

    public function buscarVendedorExistente(string $nome, string $email): ?Vendedor;


    /**
     * @return Venda[]|null
     */
    public function retornaTodasAsVendas(Vendedor $vendedor);
}
    