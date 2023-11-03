<?php
        header("Access-Control-Allow-Origin: http://localhost:8080");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: DELETE");

        require_once '../models/cake.php';

        
  if(isset($_GET['id'])){
    if(Cake::delete($_GET['id'])){
        echo json_encode([
            "status" => 200
        ]);
    }
    else{
        echo json_encode([
            "status" => 400,
        ]);

    }
}
else{
    echo json_encode([
        "status" => 405,
    ]);
}