<?php

namespace App\Http\Controllers;

use App\Domain\Venda\DtoNovaVenda;
use App\Domain\Venda\VendaServiceInterface;
use App\Domain\Vendedor\VendedorServiceInterface;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private VendaServiceInterface $vendaService;
    private VendedorServiceInterface $vendedorService;

    public function __construct(VendaServiceInterface $vendaService, VendedorServiceInterface $vendedorService)
    {
        $this->vendaService = $vendaService;
        $this->vendedorService = $vendedorService;
    }

    public function create()
    {
        $vendedores = $this->vendedorService->retornarTodosVendedores();
        return view('vendas.form_lancar', compact('vendedores'));
    }

    public function lancarVenda(Request $request)
    {
        $dtoNovaVenda = new DtoNovaVenda();
        $dtoNovaVenda->valor = $request->valor;
        $dtoNovaVenda->vendedorId = $request->vendedor_id;

        $venda = $this->vendaService->lancarVenda($dtoNovaVenda);

        if ($venda) {
            return redirect()->route('venda.lancarVenda')->with('success', 'Venda lançada com sucesso!');
        } else {
            return back()->withInput()->with('error', 'Erro ao lançar a venda. Por favor, tente novamente.');
        }
    }
}