<!DOCTYPE html>
<html>
<head>
	<title>Identificador de CEP e Cotação de Carro utilizando GET</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Identificador de CEP e Cotação de Carro utilizando GET</h1>
		<form>
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
			</div>
			<div class="form-group">
				<label for="cep">CEP:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="cep" placeholder="Digite seu CEP (somente números)">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button" id="buscar-cep">Buscar Endereço</button>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="estado">Estado:</label>
				<input type="text" class="form-control" id="estado" readonly>
			</div>
			<div class="form-group">
				<label for="cidade">Cidade:</label>
				<input type="text" class="form-control" id="cidade" readonly>
			</div>
			<div class="form-group">
				<label for="bairro">Bairro:</label>
				<input type="text" class="form-control" id="bairro" readonly>
			</div>
			<div class="form-group">
				<label for="rua">Rua:</label>
				<input type="text" class="form-control" id="rua" readonly>
			</div>
			<div class="form-group">
				<label for="codigo-fipe">Código FIPE:</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="codigo-fipe" placeholder="Digite o código FIPE">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button" id="buscar-carro">Buscar Carro</button>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="valor">Valor:</label>
				<input type="text" class="form-control" id="valor" readonly>
			</div>
			<div class="form-group">
				<label for="marca">Marca:</label>
				<input type="text" class="form-control" id="marca" readonly>
			</div>
			<div class="form-group">
				<label for="ano">Ano:</label>
				<input type="text" class="form-control" id="ano" readonly>
			</div>
		<div class="form-group">
			<label for="modelo">Modelo:</label>
			<input type="text" class="form-control" id="modelo" readonly>
		</div>
	</form>
</div>

<script>
	$(document).ready(function() {
		$('#buscar-cep').click(function() {
			var cep = $('#cep').val();
			$.get('https://brasilapi.com.br/api/cep/v2/' + cep, function(data) {
				$('#estado').val(data.state);
				$('#cidade').val(data.city);
				$('#bairro').val(data.neighborhood);
				$('#rua').val(data.street);
			});
		});
		$('#buscar-carro').click(function() {
			var codigoFipe = $('#codigo-fipe').val();
			$.get('https://brasilapi.com.br/api/fipe/preco/v1/' + codigoFipe, 
function(data){
console.log (data[0]);
  
				$('#valor').val(data[0].valor);
				$('#marca').val(data[0].marca);
				$('#ano').val(data[0].anoModelo);
				$('#modelo').val(data[0].combustivel);
			});
		});
	});
</script>
</body>
</html>
