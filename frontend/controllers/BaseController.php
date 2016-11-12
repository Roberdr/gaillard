<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 20/03/16
 * Time: 14:23
 */

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\AccessHelpers;

class BaseController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        $oper = str_replace("/", "-", Yii::$app->controller->route);

        $permitirSiempre = ['site-captcha', 'site-signup', 'site-index', 'site-error', 'site-about', 'site-contact', 'site-login', 'site-logout'];

        if (in_array($oper, $permitirSiempre)) {
            return true;
        }

        if (!AccessHelpers::getAcceso($oper)) {
            echo $this->render('/site/nopermitido');
            return false;
        }

        return true;
    }
}