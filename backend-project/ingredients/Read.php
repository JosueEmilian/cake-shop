<?php
      
       header("Access-Control-Allow-Origin: http://localhost:8080");
       header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
       header("Access-Control-Allow-Methods: GET");
       
       require_once "../models/ingredient.php";
 
            if(isset($_GET['id'])){
                echo json_encode(Ingredient::getWhere($_GET['id']));
            }
            else{
                echo json_encode(Ingredient::getAll());
            }
