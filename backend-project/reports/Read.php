<?php
      
       header("Access-Control-Allow-Origin: http://localhost:8080");
       header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
       header("Access-Control-Allow-Methods: GET");
     
       require_once '../models/reports.php';

       if ($_SERVER['REQUEST_METHOD'] === 'GET') {
           echo json_encode(Reports::getAll());
       } else {
           echo json_encode([
               "status" => 405
           ]);
       }