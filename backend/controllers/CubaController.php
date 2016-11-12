<?php

namespace backend\controllers;

use common\models\Accesorio;
use common\models\AccesorioGrupo;
use common\models\Compartimento;
use common\models\CubaSearch;
use common\models\Grupo;
use common\models\Operacion;
use common\models\Revision;
use Yii;
use common\models\Cuba;
use common\models\Model;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\db\Exception;


/**
 * CubasController implements the CRUD actions for Cuba model.
 */
class CubaController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'about'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['about', 'logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Acción para probar cosas
     */
    public function actionPrueba()
    {
        // probando cosas
        $cubas = Cuba::find()
            ->joinWith('materialExterior')
            ->with('compartimentos') 
            ->joinWith('plataforma');
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $cubas,
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        
        return $this->render('prueba', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Cuba models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CubaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'sort' => 'cuba',
        ]);
    }

    /**
     * Displays a single Cuba model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $index = Cuba::nextOrPrev($id);
        $nextID = $index['next'];
        $disableNext = ($nextID===null)?'disabled':null;
        $prevID = $index['prev'];
        $disablePrev = ($prevID===null)?'disabled':null;

        $model = $this->findModel($id);

        $revision = new ActiveDataProvider([
            'query' => Revision::find()->with('cuba')->where(['cuba_id' => $id])->orderBy('fecha_revision'),
        ]);
        $operacion = new ActiveDataProvider([
            'query' => Operacion::find()->with('cuba')->where(['cuba_id' => $id])->orderBy('fecha_operacion'),
        ]);
        $accesorio = new ActiveDataProvider([
            'query' => AccesorioGrupo::find()->joinWith('grupo')->where(['grupo.cuba_id' => $id]),
            //'query' => Grupo::find()->where(['cuba_id' => $id])->all(),//->with('accesorios'),
            'pagination' => [
                'pageSize' => 7,
                'totalCount' => AccesorioGrupo::find()->joinWith('grupo')->where(['grupo.cuba_id' => $id]),
            ]
        ]);

        $fotos = $this->getFotosCarpeta(Url::to("@backend/web/images/$model->cuba"), $model);

        return $this->render('view', [
            'model' => $model,
            'revision' => $revision,
            'operacion' => $operacion,
            'accesorio' => $accesorio,
            'fotos' => $fotos,
            'nextID' => $nextID,
            'prevID' => $prevID,
            'disableNext' => $disableNext,
            'disablePrev' => $disablePrev,
        ]);
    }

    private function getFotosCarpeta($carpeta, $model)
    {
        //$items[] = "";
        $extensionesPermitidas=array('jpg','jpeg','png','bmp','gif');
        
        $cantidad=0;
        if(is_dir($carpeta))
        {
            if ($handle = opendir("$carpeta"))
            {
                while (false !== ($file = readdir($handle)))
                {
                    //Eliminamos los datos que no nos sirven
                    if ($file != "." && $file != "..")
                    {
                        //Filtramos las imagenes.
                        //Obtenemos la extension
                        $args = explode('.',$file);
                        $largo = count($args);

                        if($largo>1)
                        {
                            $extension = strtolower(end($args));
                            if(in_array($extension,$extensionesPermitidas))
                            {

                                $items[] = Html::img("/images/$model->cuba/$file");
                                $cantidad++;
                            }

                        }
                    }

                }

                closedir($handle);
                if($cantidad!=0)
                {
                    return $items;
                }
                else
                {
                    //Quiere decir que no existen fotos en la carpeta
                    return null;
                }
            }
        }
        else
        {
            return null;
        }
    }

    /**
     * Creates a new Cuba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelCuba = new Cuba;
        $modelsCompartimento = [new Compartimento];

        if ($modelCuba->load(Yii::$app->request->post())) {
            $modelsCompartimento = Model::createMultiple(Compartimento::className());
            Model::loadMultiple($modelsCompartimento, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsCompartimento),
                    ActiveForm::validate($modelCuba)
                );
            }
            // validate all models
            $valid = $modelCuba->validate();
            $valid = Model::validateMultiple($modelsCompartimento) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $modelCuba->created_at = date('Y-m-d H:i:s', time() + (60 * 60 * 2));
                    $modelCuba->updated_at = date('Y-m-d H:i:s', time() + (60 * 60 * 2));
                    if ($flag = $modelCuba->save(false)) {
                        foreach ($modelsCompartimento as $modelCompartimento) {
                            $modelCompartimento->cuba_id = $modelCuba->id;
                            if (!($flag = $modelCompartimento->save(false))) {
                                //$transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if (true) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCuba->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelCuba' => $modelCuba,
            'modelsCompartimento' => (empty($modelsCompartimento)) ? [new Compartimento] : $modelsCompartimento,
        ]);

    }

    /**
     * Updates an existing Cuba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelCuba = $this->findModel($id);
        $modelsCompartimento = $modelCuba->compartimentos;

        if ($modelCuba->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsCompartimento, 'id', 'id');
            $modelsCompartimento = Model::createMultiple(Compartimento::className(), $modelsCompartimento);
            Model::loadMultiple($modelsCompartimento, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsCompartimento, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsCompartimento),
                    ActiveForm::validate($modelCuba)
                );
            }

            // validate all models
            $valid = $modelCuba->validate();
            $valid = Model::validateMultiple($modelsCompartimento) && $valid;

            if (true) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $modelCuba->updated_at = date('Y-m-d H:i:s', time() + (60 * 60 * 2));
                    if ($flag = $modelCuba->save(false)) {
                        if (!empty($deletedIDs)) {
                            Compartimento::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsCompartimento as $modelCompartimento) {
                            $modelCompartimento->cuba_id = $modelCuba->id;
                            if (!($flag = $modelCompartimento->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCuba->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('update', [
            'modelCuba' => $modelCuba,
            'modelsCompartimento' => (empty($modelsCompartimento)) ? [new Compartimento] : $modelsCompartimento
        ]);
    }

    /**
     * Deletes an existing Cuba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cuba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cuba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cuba::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionRevisiones($id){
        $modelCuba = $this->findModel($id);
        $modelsRevision = $modelCuba->revisiones;

        return $this->render('_inspecOficiales', [
            'modelCuba' => $modelCuba,
            'modelsRevision' => $modelsRevision,
        ]);
    }

    public function actionDetalle()
    {
        if (isset($_POST['expandRowKey'])) {
            $modelDetalle = new ActiveDataProvider([
                'query' => Accesorio::findOne($_POST['expandRowKey'])
            ]);
            return $this->renderPartial('_expand_row_detail', ['model' => $modelDetalle]);
            //return '<div class="alert alert-success">Data found</div>';
        } else
        {
        return '<div class="alert alert-danger">No data found</div>';
        }
    }
    
    public function actionCubaGrupos()
    {
        $cubas = Cuba::find()->orderBy('cuba')->all();
        
        return $this->render('cuba-grupos', ['cubas' => $cubas]);
       
    }
}
