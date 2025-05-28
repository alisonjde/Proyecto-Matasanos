<?php
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
$ids = isset($_POST["seleccionada"]) ? $_SESSION["citas_seleccionadas"] : [];
$cita = new Cita();

?>

<body>
	<?php
	include("presentacion/encabezado.php");
	include("presentacion/menu" . ucfirst($rol) . ".php");


	if (isset($_POST["modificar"]) && !empty($_POST["seleccionada"])) {
		include("Modificar.php");
		$_SESSION["citas_seleccionadas"] = $_POST["seleccionada"];
		$ids = $_POST["seleccionada"];
	}
	if (isset($_POST["opcion"])) {
		$estado = $_POST["opcion"];
		$cambiarEstado = $cita->modificarEstado($estado, $ids);

		if ($cambiarEstado) {
			echo "<div class= 'container mt-2'><div class='alert alert-success' role='alert'>
  			 Estado modificado
			</div></div>";
		} elseif($cambiarEstado==false) {
			echo "<div class= 'container mt-2'><div class='alert alert-success' role='alert'>
  			 Error en modificar estado
			</div></div>";
		}
	}

	?>
	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h4>Citas</h4>
					</div>
					<div class="card-body">
						<?php

						$citas = $cita->consultar($rol, $id);

						//Formulario por post
						echo "<form method='post'>
					<table class='table table-striped table-hover'>";
						echo "<tr><td>Id</td><td>Fecha</td><td>Hora</td>";
						if ($rol != "paciente") {
							echo "<td>Paciente</td>";
						}
						if ($rol != "medico") {
							echo "<td>Medico</td>";
						}
						echo "<td>Consultorio</td>";
						echo "<td>Estado de cita</td>";
						if ($rol == "admin") {
							echo "
						
							<td> 
								<button type='submit' class='btn btn-primary' name='modificar'>Modificar</button>
							</td>";
						}
						echo "</tr>";
						foreach ($citas as $cit) {
							echo "<tr>";
							echo "<td>" . $cit->getId() . "</td>";
							echo "<td>" . $cit->getFecha() . "</td>";
							echo "<td>" . $cit->getHora() . "</td>";
							if ($rol != "paciente") {
								echo "<td>" . $cit->getPaciente()->getNombre() . " " . $cit->getPaciente()->getApellido() . "</td>";
							}
							if ($rol != "medico") {
								echo "<td>" . $cit->getMedico()->getNombre() . " " . $cit->getMedico()->getApellido() . "</td>";
							}
							echo "<td>" . $cit->getConsultorio()->getNombre() . "</td>";
							echo "<td>" . $cit->getEstadoCita()->getValor() . "</td>";
							if ($rol == "admin") {
								//Boton para admin
								echo "<td class='text-center'> <input type='checkbox' name='seleccionada[]' value='" . $cit->getId() . "'></td>";
							}
							echo "</tr>";
						}
						echo "</table></form>";
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>