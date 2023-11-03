<?php

        header("Access-Control-Allow-Origin: http://localhost:8080");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Access-Control-Request-Method");
        header("POST");

        require_once '../models/cake_ingredient_master.php';

         $data = json_decode(file_get_contents('php://input'));
         if($data != NULL){
             if(Cake_Ingredient_Master::insert($data->id_pastel, $data->id_ingrediente)){
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