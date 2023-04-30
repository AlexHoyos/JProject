<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["id"], $_POST["titulo"], $_POST["descripcion"], $_POST["longitud"], $_POST["altura"], $_POST["tecnica"], $_POST["tipo_color"], $_POST["precio"])){

            $pintura = Pintura::getPinturaById(intval($_POST["id"]));

            if($pintura != null){

                $longitud = intval($_POST["longitud"]);
                $altura = intval($_POST["altura"]);
                $precio = floatval($_POST["precio"]);

                if($_POST["tipo_color"] != "calido" && $_POST["tipo_color"] != "frio")
                    $_POST["tipo_color"] = "calido";
                
                $editPintura = Pintura::update(Pintura::class, [
                    "titulo" => $_POST["titulo"],
                    "descripcion" => $_POST["descripcion"],
                    "longitud" => $longitud,
                    "altura" => $altura,
                    "tecnica" => $_POST["tecnica"],
                    "tipo_color" => $_POST["tipo_color"],
                    "precio" => $precio
                ], "id", $pintura->id);

                if($editPintura){

                    if(isset($_FILES["cuadro"])){
                        $nombreCuadro = uniqid(str_replace(" ", "", $_POST["titulo"])."_".time()).".jpg";
    
                        if(isset($_FILES["cuadro"]["tmp_name"])){
        
                            if(move_uploaded_file($_FILES["cuadro"]["tmp_name"], "../../IMG/pinturas/".$nombreCuadro)){
            
            
                                $editPintura = Pintura::update(Pintura::class, ["vista_url" => $nombreCuadro], "id", $pintura->id);
                                if($editPintura){
                                    echo "Pintura actualizada con exito";
                                } else {
                                    echo "Error al actualizar cuadro de la pintura";
                                }
                
                            } else {
                                echo "Se ha actualizado la pintura pero no el cuadro!";
                            }
            
                        } else {
                            echo "Pintura actualizada sin imagen!";
                        }
    
                    } else {
                        echo "Pintura actualizada!";
                    }

                } else {
                    echo "Error al actualizar la pintura!";
                }

            } else {
                echo "No se encontro la pintura!";
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
