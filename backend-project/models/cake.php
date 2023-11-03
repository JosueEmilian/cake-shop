<?php
    require_once('../connection/connection.php');

    class Cake {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT P.ID_PASTEL AS ID,
                             P.NOMBRE AS NOMBRE,
                             P.DESCRIPCION AS DESCRIPCION,
                             PR.NOMBRE AS NOMBRE_PREPARADOR,
                             PR.APELLIDO AS APELLIDO_PREPARADOR,
                             P.FECHA_CREACION AS FECHA_CREACION,
                             P.FECHA_VENCIMIENTO AS FECHA_VENCIMIENTO
                      FROM TB_PASTEL P
                      JOIN TB_PREPARADOR PR ON P.ID_PREPARADOR = PR.ID_PREPARADOR;";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];

            while($row = $result->fetch_assoc()){
                $data[] = [
                    'id' => $row['ID'],
                    'nombre' => $row['NOMBRE'],
                    'descripcion' => $row['DESCRIPCION'],
                    'nombre_preparador' => $row['NOMBRE_PREPARADOR'],
                    'apellido_preparador' => $row['APELLIDO_PREPARADOR'],
                    'fecha_creacion' => $row['FECHA_CREACION'],
                    'fecha_vencimiento' => $row['FECHA_VENCIMIENTO']
                ];
            }
            $stmt->close();
            $db->close();
            return $data;
        }

        public static function getWhere($id_cake){
            $db = new Connection();
            $query = "SELECT P.ID_PASTEL AS ID,
                             P.NOMBRE AS NOMBRE,
                             P.DESCRIPCION AS DESCRIPCION,
                             PR.ID_PREPARADOR AS ID_PREPARADOR,
                             PR.NOMBRE AS NOMBRE_PREPARADOR,
                             PR.APELLIDO AS APELLIDO_PREPARADOR,
                             P.FECHA_CREACION AS FECHA_CREACION,
                             P.FECHA_VENCIMIENTO AS FECHA_VENCIMIENTO
                      FROM TB_PASTEL P
                      JOIN TB_PREPARADOR PR ON P.ID_PREPARADOR = PR.ID_PREPARADOR 
                      WHERE P.ID_PASTEL = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i', $id_cake);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];

            while($row = $result->fetch_assoc()){
                $data[] = [
                    'id' => $row['ID'],
                    'nombre' => $row['NOMBRE'],
                    'descripcion' => $row['DESCRIPCION'],
                    'id_preparador' => $row['ID_PREPARADOR'],
                    'nombre_preparador' => $row['NOMBRE_PREPARADOR'],
                    'apellido_preparador' => $row['APELLIDO_PREPARADOR'],
                    'fecha_creacion' => $row['FECHA_CREACION'],
                    'fecha_vencimiento' => $row['FECHA_VENCIMIENTO']
                ];
            }
            $stmt->close();
            $db->close();
            return $data;
        }

        public static function insert($nombre, $descripcion, $id_preparador, $fecha_creacion, $fecha_vencimiento){
            $db = new Connection();
            $query = "INSERT INTO TB_PASTEL (NOMBRE, DESCRIPCION, ID_PREPARADOR, FECHA_CREACION, FECHA_VENCIMIENTO)
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssiss', $nombre, $descripcion, $id_preparador, $fecha_creacion, $fecha_vencimiento);
            $stmt->execute();
            $stmt->close();
            $db->close();
        }

        public static function update($id, $nombre, $descripcion, $id_preparador, $fecha_creacion, $fecha_vencimiento){
            $db = new Connection();
            $query = "UPDATE TB_PASTEL SET NOMBRE = ?, DESCRIPCION = ?, ID_PREPARADOR = ?, FECHA_CREACION = ?,
                                           FECHA_VENCIMIENTO = ? WHERE ID_PASTEL = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssissi', $nombre, $descripcion, $id_preparador, $fecha_creacion, $fecha_vencimiento, $id);

            if($stmt->execute()){
                $stmt->close();
                $db->close();
                return true;
            } else {
                $stmt->close();
                $db->close();
                return false;
            }
        }
        
        public static function delete($id_cake){
            $db = new Connection();
            $query = "DELETE FROM TB_PASTEL WHERE ID_PASTEL = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i', $id_cake);

            if($stmt->execute()){
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