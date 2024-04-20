<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas do Vendedor {{ $vendedor->nome }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Vendas do Vendedor: {{ $vendedor->nome }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do Vendedor</th>
                    <th>Email do Vendedor</th>
                    <th>Comissão</th>
                    <th>Valor da Venda</th>
                    <th>Data da Venda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->id }}</td>
                    <td>{{ $vendedor->nome }}</td>
                    <td>{{ $vendedor->email }}</td>
                    <td>{{ $venda->comissao }}</td>
                    <td>R$ {{$venda->valor }}</td>
                    <td>{{ $venda->data }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
