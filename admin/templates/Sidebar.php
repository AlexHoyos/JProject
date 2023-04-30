<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height:100vh">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <?php
    /**
     * OBTENER VENTANA ACTIVA ACTUAL
     */
    $uri = explode("#", $_SERVER['REQUEST_URI'])[0];
    $actual = "index";
    if(str_contains($uri, "mensajes")){
        $actual = "mensajes";
    } else if(str_contains($uri, "estadisticas")){
        $actual = "estadisticas";
    } else if(str_contains($uri, "envios")){
        $actual = "envios";
    } else if(str_contains($uri, "ventas")){
        $actual = "ventas";
    } else if(str_contains($uri, "pinturas")){
        $actual = "pinturas";
    }
    ?>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link text-white <?=($actual=="index")?"active":""?>" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Inicio
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white <?=($actual=="estadisticas")?"active":""?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Estadisticas
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white <?=($actual=="envios")?"active":""?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Envios
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white <?=($actual=="ventas")?"active":""?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Ventas
        </a>
      </li>
      <li>
        <a href="pinturas.php" class="nav-link text-white <?=($actual=="pinturas")?"active":""?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Pinturas
        </a>
      </li>
      <li>
        <a href="mensajes.php" class="nav-link text-white <?=($actual=="mensajes")?"active":""?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            Mensajes
          <?php
            $newMsg = Mensaje::getNewMsgCount();
            if($newMsg > 0){
                if($newMsg == 99) $newMsg = "+" . $newMsg;
          ?>
            <span class="badge bg-danger rounded-pill"><?=$newMsg?></span>
            <?php } ?>
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$admin->usuario?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="config.php">Configuración</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>