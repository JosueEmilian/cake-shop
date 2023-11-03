<?php
    require_once('../connection/connection.php');


    class Preparer {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM TB_PREPARADOR";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];

            while($row = $result->fetch_assoc()){
                $data[] = [
                    'id' => $row['ID_PREPARADOR'],
                    'nombre' => $row['NOMBRE'],
                    'apellido' => $row['APELLIDO'],
                    'direccion' => $row['DIRECCION'],
                    'telefono' => $row['TELEFONO'],
                    'estatus' => $row['ESTATUS']
                ];
            }
            $stmt->close();
            $db->close();
            return $data;
        }
    }