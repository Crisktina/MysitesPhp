<?php
    if(!empty($_POST["nomBuscar"])) {
        $valorNombreBusqueda = strtolower(trim($_POST['nomBuscar']));
        ?>
        <div class="row mb-2">
              <?php
              // Mostrar lista de amigos almacenados en la sesión
              if(isset($arrayUsuario)) {
                foreach($arrayUsuario['friends'] as $amigo) {
                    if (str_contains(strtolower($amigo['nom']), $valorNombreBusqueda)===true) {
                        $amigosCoincidentes[] = $amigo;
                     }}
                     if (!empty($amigosCoincidentes)){
                      foreach ($amigosCoincidentes as $amigoCoincidente) {
                          ?>
                      <div class="col-md-6">
                        <div class="card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                              <h3 class="mb-0"><?=$amigoCoincidente['nom']?></h3>
                              <h3 class="mb-0"><?=$amigoCoincidente['cognom']?></h3>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                              <img src="<?=$amigoCoincidente['imatge']?>" alt="imagen" class="bd-placeholder-img" width="300" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                            </div>
                        </div>
                      </div>
                    <?php }} 
                    else {
                      echo "No hay coincidencias.";
                    }
              } else if (count($arrayUsuario['friends'])==0) {
                echo "No hay amigos creados.";
                echo "<div class=\"invalid-feedback\">No hay amigos creados.</div>";
              } ?> 
        </div>
        
<?php
    }

?>