<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 8/10/16
 * Time: 19:31
 */

namespace console\controllers;

use \yii\console\Controller;
use \yii\helpers\Console;

/**
 * A basic controller for our Yii2 Application
 * Class BasicController
 * @package console\controllers
 */
class BasicController extends Controller
{
    /**
     * Outputs Hola que ase
     * @return int
     */
    public function actionIndex()
    {
        echo "Hola que ase \n";
        return 0;
    }

    /**
     * Outputs "$name lives in $city"
     * @param $name
     * @param string $city
     * @return int
     */
    public function actionLivesIn($name, $city="Chicago")
    {
        echo "$name lives in $city.\n";
        return 0;
    }

    /**
     * Outputs each element of the input $array on a new line
     * @param array $array
     * @return int
     */
    public function actionListElements(array $array)
    {
        foreach ($array as $k)
        {
            echo "$k\n";
        }
        return 0;
    }

    /**
     * Returns succesfully IFF $shouldRun is set to any positive integer greater than 0
     *
     *
     * @param int $shouldRun
     * @return int
     */
    public function actionConditionalExit($shouldRun=0)
    {
        if ((int)$shouldRun < 0)
        {
            echo 'The $shouldRun argument must be an positive non-zero integer' . "\n";
            return Controller::EXIT_CODE_ERROR;  //returns 1
        }

        return Controller::EXIT_CODE_NORMAL;     //returns 0
    }

    /**
     * Outputs text in bold and cyan
     *
     * @return int
     */
    public function actionColors()
    {
        $this->stdout("Waiting on important thing to happen...\n", Console::BOLD);

        $yay = $this->ansiFormat('Yay', Console::FG_CYAN);
        echo "$yay! We're done!\n";
        return Controller::EXIT_CODE_NORMAL;
    }
}
