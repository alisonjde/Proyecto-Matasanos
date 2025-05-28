<div class="offcanvas offcanvas-end show" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Citas a modificar</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php

    //id Citas en la lista "seleccionada[]"
    $Citas_seleccionadas = $_POST["seleccionada"];

    // mostrar los id seleccionados
    
    echo "<div class='alert alert-info mt-3'>";
    echo "<strong>IDs de citas seleccionadas: </strong><br>";

    echo implode(", ", $Citas_seleccionadas);


    echo "</div>";


    ?>
    <form method="post"><!-- formulario de cambios -->
      <?php
      foreach ($Citas_seleccionadas as $idCita) {
        echo "<input type='hidden' name='seleccionada[]' value='" . $idCita . "'>";
      }
      ?>
      <div class="btn-group">
        <button name="boton" type="button" class="btn btn-primary">Cambiar estado</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
          aria-expanded="false">
          <span class="visually-hidden">Toggle Dropdown</span>
        </button>

        <ul class="dropdown-menu">


          <?php
          $estadoCita = new EstadoCita();
          $estadosCita = $estadoCita->consultar();


          foreach ($estadosCita as $est) {
            echo "<li><button type='submit' name='opcion' value= '" . $est->getId() . "' class='dropdown-item'>" . $est->getValor() . "</button></li>";
            echo "<hr class='dropdown-divider>'";
          }
          ?>

        </ul>

      </div>
    </form>
  </div>
</div>