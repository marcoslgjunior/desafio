<!-- resources/views/vendas/nova.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançar Nova Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lançar Nova Venda</h1>
        <hr>
        <form action="{{ route('vendas.lancarVenda') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vendedor_id">ID do Vendedor</label>
                <input type="text" class="form-control" id="vendedor_id" name="vendedor_id" value="{{ $vendedor->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $vendedor->nome }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $vendedor->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="comissao">Comissão</label>
                <input type="text" class="form-control" id="comissao" name="comissao" value="{{ $vendedor->comissao }}" readonly>
            </div>
            <div class="form-group">
                <label for="valor">Valor da Venda</label>
                <input type="text" class="form-control" id="valor" name="valor" required>
            </div>
            <button type="submit" class="btn btn-primary">Lançar Venda</button>
        </form>
    </div>
</body>
</html>
