<?php

namespace App\Http\Controllers;

use App\Domain\Vendedor\DtoCriarVendedor;
use App\Domain\Vendedor\DtoResponseVendas;
use App\Domain\Vendedor\DtoResponseVendedor;
use App\Domain\Vendedor\VendedorServiceInterface;
use Illuminate\Http\Request;
use Exception;



class VendedorController extends Controller
{
    private VendedorServiceInterface $vendedorService;

    public function __construct(VendedorServiceInterface $vendedorService)
    {
        $this->vendedorService = $vendedorService;
    }
    public function criarVendedor(Request $requisicao)
    {
        try {
            $dtoCriarVendedor = new DtoCriarVendedor();
            $dtoCriarVendedor->nome = $requisicao->nome;
            $dtoCriarVendedor->email = $requisicao->email;
            $vendedor = $this->vendedorService->buscarVendedorExistente($dtoCriarVendedor->nome, $dtoCriarVendedor->email);
            if($vendedor !== null) {
                return redirect()->route('vendedor.create')->with('success', 'E-mail já cadastrado para um colaborador');

            }
            $vendedor = $this->vendedorService->criarVendedor($dtoCriarVendedor);
            return redirect()->route('vendedor.create')->with('success', 'Vendedor cadastrado com sucesso.');
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['message' => 'E-mail já cadastrado'], 400);
            }        
            $mensagemErro = 'Erro ao cadastrar o vendedor';
            return redirect()->route('vendedor.create')->with('fail', $mensagemErro);
        } 
        return view('product');
    }

    public function listarVendedores()
    {
        try {
            $vendedores = $this->vendedorService->retornarTodosVendedores();
            $retorno = [];
            foreach ($vendedores as $vendedor) {
                $retorno[] = new DtoResponseVendedor(
                    $vendedor,
                    $this->vendedorService->calculaComissaoVendedor($vendedor)
                );
            }
            return view('listar_vendedores.index', compact('vendedores'));
        } catch (Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro ao listar os vendedores.'], 500);
        }
    } 

    public function listarVendas($vendedorId = 1)
    {
        $vendedorId = (int) $vendedorId;
        $vendedor = $this->vendedorService->buscarVendedorPorId($vendedorId);
        $vendas = $this->vendedorService->retornaTodasAsVendas($vendedor);
        $retorno = [];
        foreach ($vendas as $venda) {
            $retorno[] = new DtoResponseVendas(
                $vendedor,
                $venda
            );
        }
        return view('vendas.listar', compact('vendedor', 'vendas'));
    }
    public function create()
    {
        return view('cadastrar_vendedor.index');
    }
}
