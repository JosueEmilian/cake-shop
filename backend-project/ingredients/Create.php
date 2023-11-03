<?php

        header("Access-Control-Allow-Origin: http://localhost:8080");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Access-Control-Request-Method");
        header("POST");

        require_once '../models/ingredient.php';

         $data = json_decode(file_get_contents('php://input'));
         if($data != NULL){
             if(Ingredient::insert($data->nombre, $data->descripcion, $data->fecha_ingreso, $data->fecha_vencimiento)){
                 echo json_encode([
                     "status" => 200
                 ]);
             }
             else{
                    echo json_encode([
                        "status" => 400,
                    ]);
             }
         } else{
                echo json_encode([
                    "status" => 405,
                ]);
         }