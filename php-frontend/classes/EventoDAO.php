<?php
require_once 'Conexao.php';

class EventoDAO
{
    public static function listarPorArea($area)
    {
        $sql = "SELECT * FROM eventos WHERE area = :area ORDER BY data_evento DESC";
        $con = Conexao::conectar();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':area', $area);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}