<?php
// Desactivar toda las notificaciónes del PHP
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculo de Muestra</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="jumbotron text-center">
		<h1>CALCULO DE MUESTRA</h1>
		<p>Aplicacion que me permite calcular la muestra finita e ininita</p>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h3>Universo Finito</h3>
				<p>Se conoce el tamaño, a veces son tan grandes que se comportan como infinitas. Existe un marco muestral donde hallar las unidades de análisis ( marcos muestrales = listas, mapas, documentos)</p>
				<form action="index.php" method="post">
					<table class="table table-dark table-striped">
						<thead>
							<tr>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th>Variable</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>N</td>
								<td>Tamaño de la Poblacion o Universo</td>
								<td><input type="number" name="N" min="1" step="1" placeholder="#" onkeydown="filtro()">
									<script>
										function filtro(){
											var tecla = event.key;
											if (['.','e'].includes(tecla))
											event.preventDefault()
										}
									</script>
								</td>
							</tr>
							<tr>
								<td>Z</td>
								<td>Parámetro estadístico que depende el nivel de confianza (NC)</td>
								<td>
									<select name="Z" id="Z">
										<option value="0">Seleccione:</option>
										<?php
											$mysqli = new mysqli("localhost", "root", "", "muestra");
											$query = $mysqli -> query ("SELECT * FROM `nivel_confianza`");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[2].'">'.$valores[1].'</option>';
											}
								        ?>
									</select>
									
								</td>
							</tr>
							<tr>
								<td>e</td>
								<td>Error de estimación maximo aceptado</td>
								<td><input type="number" name="e"></td>
							</tr>
							<tr>
								<td>p</td>
								<td>Probabilidad de que ocurra el evento estudiado (éxito)</td>
								<td><input type="number" name="p"></td>
							</tr>
							<tr>
								<td>q</td>
								<td> (1-p)Probabilidad de que ocurra no el evento estudiado (éxito)</td>
								<td><input type="number" name="q"></td>
							</tr>
						</tbody>
					</table>
					<input type="submit">
				</form>
		    </div>
		    <div class="col-sm-6">
				<h3>Universo Infinito</h3>
				<p>no se conoce el tamaño y no se tiene la posibilidad de contar o construir un marco muestral ( listado en el que encontramos las unidades elementales que componen la población)</p>
				<table class="table table-dark table-striped">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Descripcion</th>
							<th>Variable</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>n</th>
							<th>Tamaño de la muestra buscado</th>
							<th>Variable</th>
						</tr>
						<tr>
							<td>N</td>
							<td>Tamaño de la Poblacion o Universo</td>
							<td>Variable</td>
						</tr>
						<tr>
							<td>Z</td>
							<td>Parámetro estadístico que depende el nivel de confianza (NC)</td>
							<td>Variable</td>
						</tr>
						<tr>
							<td>e</td>
							<td>Error de estimación maximo aceptado</td>
							<td>Variable</td>
						</tr>
						<tr>
							<td>p</td>
							<td>Probabilidad de que ocurra el evento estudiado (éxito)</td>
							<td>Variable</td>
						</tr>
						<tr>
							<td>q</td>
							<td> (1-p)Probabilidad de que ocurra no el evento estudiado (éxito)</td>
							<td>Variable</td>
						</tr>
					</tbody>
				</table>
		    </div>

		</div>
	</div>
	<?php
	$N=$_POST['N'];
	$Z=$_POST['Z'];
	$e=$_POST['e']/100;
	$p=$_POST['p']/100;
	$q=$_POST['q']/100;

	$numerador=($N*($Z*$Z)*$p*$q);
	$divisor=(($e*$e)*($N-1))+(($Z*$Z)*$p*$q);
	$n=$numerador/$divisor;
	echo '<div class="jumbotron"><h1>El resultado es '.$n.'</h1></div>';
/*
	echo $N."<BR>";
	echo $Z."<BR>";
	echo $p."<BR>";
	echo $q."<BR>";
	echo $e."<BR>";

	echo $numerador."<BR>";
	echo $divisor."<BR>";
*/
	?>
	
</body>
</html>

