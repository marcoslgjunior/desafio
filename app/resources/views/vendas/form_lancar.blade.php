<!-- resources/views/vendas/form_lancar.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançar Nova Venda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Lançar Nova Venda</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('venda.lancarVenda') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="vendedor_id">Vendedor:</label>
                        <select class="form-control" id="vendedor_id" name="vendedor_id" required>
                            <option value="">Selecione um vendedor</option>
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor->id }}">{{ $vendedor->nome }} - {{ $vendedor->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor da Venda:</label>
                        <input type="text" class="form-control" id="valor" name="valor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lançar Venda</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
