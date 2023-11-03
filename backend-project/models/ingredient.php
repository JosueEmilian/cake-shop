<?php
    require_once("../connection/connection.php");

    class Ingredient {
        public static function getAll() {
            $db = new Connection();
            $query = "SELECT ID_INGREDIENTE, NOMBRE, DESCRIPCION, FECHA_INGRESO, FECHA_VENCIMIENTO 
                      FROM TB_INGREDIENTE";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
        
            while ($row = $result->fetch_assoc()) {
                $data[] = [
                    "id"=> $row["ID_INGREDIENTE"],
                    "nombre"=> $row["NOMBRE"],
                    'descripcion'=> $row['DESCRIPCION'],
                    'fecha_ingreso' => $row['FECHA_INGRESO'],
                    'fecha_vencimiento' => $row['FECHA_VENCIMIENTO'],
                ];
            }
        
            $stmt->close();
            $db->close();
            return $data;
        }
        

        public static function getWhere($id_ingredient) {
            $db = new Connection();
            $query = "SELECT * FROM TB_INGREDIENTE WHERE ID_INGREDIENTE = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $id_ingredient);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
        
            while ($row = $result->fetch_assoc()) {
                $data[] = [
                    "id"=> $row["ID_INGREDIENTE"],
                    "nombre"=> $row["NOMBRE"],
                    'descripcion'=> $row['DESCRIPCION'],
                    'fecha_ingreso' => $row['FECHA_INGRESO'],
                    'fecha_vencimiento' => $row['FECHA_VENCIMIENTO'],
                ];
            }
        
            $stmt->close();
            $db->close();
            return $data;
        }
        

        public static function insert($nombre, $descripcion, $fecha_ingreso, $fecha_vencimiento){
            $db = new Connection();
            $query = "INSERT INTO TB_INGREDIENTE (NOMBRE, DESCRIPCION, FECHA_INGRESO, FECHA_VENCIMIENTO) 
                      VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssss", $nombre, $descripcion, $fecha_ingreso, $fecha_vencimiento);
            $stmt->execute();
            $stmt->close();
            $db->close();
        }
        
        public static function update($id, $nombre, $descripcion, $fecha_ingreso, $fecha_vencimiento){
            $db = new Connection();
            $query = "UPDATE TB_INGREDIENTE SET NOMBRE = ?, DESCRIPCION = ?, FECHA_INGRESO = ?, FECHA_VENCIMIENTO = ? 
                      WHERE ID_INGREDIENTE = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssssi", $nombre, $descripcion, $fecha_ingreso, $fecha_vencimiento, $id);
        
            if ($stmt->execute()) {
                $stmt->close();
                $db->close();
                return true; 
            } else {
                $stmt->close();
                $db->close();
                return false; 
            }
        }

        public static function delete($id_ingredient) {
            $db = new Connection();
            $query = "DELETE FROM TB_INGREDIENTE WHERE ID_INGREDIENTE = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $id_ingredient);
        
            if ($stmt->execute()) {
                $stmt->close();
                $db->close();
                return true; 
            } else {
                $stmt->close();
                $db->close();
                return false; 
            }
        }
        
        
    }

