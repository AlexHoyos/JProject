<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["titulo"], $_POST["descripcion"], $_POST["longitud"], $_POST["altura"], $_POST["tecnica"], $_POST["tipo_color"], $_POST["precio"], $_FILES["cuadro"])){

            $longitud = intval($_POST["longitud"]);
            $altura = intval($_POST["altura"]);
            $precio = floatval($_POST["precio"]);

            $nombreCuadro = uniqid(str_replace(" ", "", $_POST["titulo"])."_".time()).".jpg";
            if($_POST["tipo_color"] != "calido" && $_POST["tipo_color"] != "frio")
                $_POST["tipo_color"] = "calido";
            
            if(isset($_FILES["cuadro"]["tmp_name"])){

                if(move_uploaded_file($_FILES["cuadro"]["tmp_name"], "../../IMG/pinturas/".$nombreCuadro)){


                    $nuevaPintura = Pintura::create(Pintura::class, ["titulo", "descripcion", "longitud", "altura", "tecnica", "tipo_color", "precio", "vista_url"],
                                                        ["'".$_POST["titulo"]."'", "'".$_POST["descripcion"]."'", $longitud, $altura, "'".$_POST["tecnica"]."'", "'".$_POST["tipo_color"]."'", $precio, "'{$nombreCuadro}'"]);
                    if($nuevaPintura){
                        echo "Pintura creada con exito";
                    } else {
                        echo "Error al crear la pintura";
                    }
    
                } else {
                    echo "Error al subir el cuadro:(";
                }

            } else {
                echo "No se recibio la imagen del cuadro!";
            }

        } else {
            echo "Se esperaban más parametros! ";
        }

    } else {
        echo "No eres adminn!";
    }

} else {
    echo "No eres admin!";
}
