<?php
        header("Access-Control-Allow-Origin: http://localhost:8080");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Access-Control-Request-Method");
        header('Access-Control-Allow-Methods: PUT');

        require_once '../models/cake.php';


                $data = json_decode(file_get_contents('php://input'));
                if($data != NULL){
                    if(Cake::update($data->id, $data->nombre, $data->descripcion, $data->id_preparador, $data->fecha_creacion, $data->fecha_vencimiento)){
                        echo json_encode([
                            "status" => 200
                        ]);
                    }
                    else{
                        echo json_encode([
                            "status" => 400
                        ]);
    
                    }
                } else{
                    echo json_encode([
                        "status" => 405
                    ]);
                }