<?php
    require_once("../connection/connection.php");

    class Reports {
        public static function getAll() {
            $db = new Connection();
            $query = "SELECT
                            pi.ID_PASTEL_INGREDIENTE AS 'ID',
                            p.NOMBRE AS 'PASTEL',
                            i.NOMBRE AS 'INGREDIENTE',
                            p.DESCRIPCION AS 'DESCRIPCION'
                        FROM
                            TB_PASTEL p
                            LEFT JOIN TB_PASTEL_INGREDIENTE pi ON p.ID_PASTEL = pi.ID_PASTEL
                            LEFT JOIN TB_INGREDIENTE i ON pi.ID_INGREDIENTE = i.ID_INGREDIENTE
                        ORDER BY
                            p.ID_PASTEL, i.ID_INGREDIENTE;";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
        
            while ($row = $result->fetch_assoc()) {
                $data[] = [
                    "id"=> $row["ID"],
                    "pastel"=> $row["PASTEL"],
                    "ingrediente"=> $row["INGREDIENTE"],
                    "descripcion" => $row["DESCRIPCION"]
                ];
            }
        
            $stmt->close();
            $db->close();
            return $data;
        }
    }