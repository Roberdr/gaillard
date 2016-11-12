<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 19/03/16
 * Time: 20:09
 */

namespace common\models;

use yii;


class AccessHelpers {

    public static function getAcceso($oper)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT o.nombre
                FROM user u
                JOIN rol r ON u.rol_id = r.id
                JOIN rol_oper ro ON r.id = ro.rol_id
                JOIN oper o ON ro.oper_id = o.id
                WHERE o.nombre =:oper
                AND u.rol_id =:rol_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":oper", $oper);
        $command->bindValue(":rol_id", Yii::$app->user->identity->rol_id);
        $result = $command->queryOne();

        if ($result['nombre'] != null){
            return true;
        } else {
            return false;
        }
    }