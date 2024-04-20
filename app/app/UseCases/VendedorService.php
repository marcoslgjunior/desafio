<?php

namespace App\UseCases;

use App\Domain\Vendedor\DtoResponseVendedor;
use App\Domain\Vendedor\Vendedor;
use App\Domain\Vendedor\DtoCriarVendedor;
use App\Domain\Venda\VendaRepositoryInterface;
use App\Domain\Vendedor\VendedorServiceInterface;
use App\Domain\Vendedor\VendedorRepositoryInterface;

class VendedorService implements VendedorServiceInterface
{
    private VendedorRepositoryInterface $vendedorRepository;
    private VendaRepositoryInterface $vendaRepository;

    public function __construct(VendedorRepositoryInterface $vendedorRepository, VendaRepositoryInterface $vendaRepository)
    {
        $this->vendedorRepository = $vendedorRepository;
        $this->vendaRepository = $vendaRepository;
    }
    public function criarVendedor(DtoCriarVendedor $dtoCriarVendedor): Vendedor
    {
        $vendedor = new Vendedor();
        $vendedor->nome = !empty($dtoCriarVendedor->nome) ? ($dtoCriarVendedor->nome) : '';
        $vendedor->email = !empty($dtoCriarVendedor->email) ? ($dtoCriarVendedor->email) : '';
        $vendedor->id = $this->vendedorRepository->insertVendedor($vendedor);

        return $vendedor;
    }

    public function retornarTodosVendedores(): array
    {
        $vendedores = $this->vendedorRepository->retornarTodosVendedores();

        if (empty($vendedores)) {
            return [];
        }

        foreach ($vendedores as $vendedor) {
            $vendedor->vendas = $this->vendaRepository->buscarVendasPorVendedor($vendedor->id);
            $retorno[] = $vendedor;
        }

        return $retorno;
    }

    public function calculaComissaoVendedor(Vendedor $vendedor): float
    {
        if (empty($vendedor->vendas)) {
            return 0.0;
        }

        return array_reduce($vendedor->vendas, fn($total, $venda): float => $total += $venda->comissao, 0);
    }

    public function retornaTodasAsVendas(Vendedor $vendedor)
    {
        return $this->vendaRepository->buscarVendasPorVendedor($vendedor->id);
    }

    public function buscarVendedorPorId($id): Vendedor|null
    {
        return $this->vendedorRepository->buscarVendedorPorId($id);
    }
    public function buscarVendedorExistente(string $nome, string $email): ?Vendedor
    {
        return $this->vendedorRepository->buscarVendedorExistente($nome, $email);
    }

}
