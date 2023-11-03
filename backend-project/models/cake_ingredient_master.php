<?php
    require_once('../connection/connection.php');

    class Cake_Ingredient_Master {
        public static function insert($id_pastel, $id_ingrediente){
            $db = new Connection();
            $query = "INSERT INTO TB_PASTEL_INGREDIENTE (ID_PASTEL, ID_INGREDIENTE) 
                      VALUES (?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ii", $id_pastel, $id_ingrediente);
            $stmt->execute();
            $stmt->close();
            $db->close();
        }
    }