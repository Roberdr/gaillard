<?php

namespace backend\controllers;

use common\models\AccesorioGrupo;
use common\models\DetalleAccesorio;
use common\models\Grupo;
use Yii;
use common\models\Accesorio;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Model;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\db\Exception;



/**
 * AccesorioController implements the CRUD actions for Accesorio model.
 */
class AccesorioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Accesorio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Accesorio::find();

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
                'totalCount' => $totalCount,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'totalCount' => $totalCount,
        ]);

    }

    /**
     * Lists all Accesorio models per Grupo.
     * @return mixed
     */
    public function actionIndexGrupo()
    {
        $query = AccesorioGrupo::find()->with('grupo')->groupBy('id')->with('accesorio');
        
        //$query->filterWhere('like', 'grupo')

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
                'totalCount' => $totalCount,
            ],
        ]);

        return $this->render('index_grupo', [
            'dataProvider' => $dataProvider,
            'totalCount' => $totalCount,
        ]);
    }

    /**
     * Lists all Accesorio models per Grupo with their DetalleAccesorio.
     * @return mixed
     */
/*    public function actionViewGrupo()
    {
        $query = AccesorioGrupo::find()->with('grupo')->groupBy('id')->with('accesorio');

        //$query->filterWhere('like', 'grupo')

        $totalCount = $query->count();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
                'totalCount' => $totalCount,
            ],
        ]);

        return $this->render('index_grupo', [
            'dataProvider' => $dataProvider,
            'totalCount' => $totalCount,
        ]);
    }*/
    
    /**
     * Displays a single Accesorio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (isset($_POST['expandRowKey']))
        {
            $detalle = $_POST['expandRowKey'];
        }else
        {
            $detalle = $id;
        }
        $model = $this->findModel($detalle);
        $detalleAccesorio = new ActiveDataProvider([
            'query' => DetalleAccesorio::find()
                ->with('accesorio')
                ->where(['accesorio_id' => $detalle]),
        ]);
        return $this->render('view', [
            'model' => $model,
            'detalleAccesorio' => $detalleAccesorio,
        ]);
    }

    public function actionDetalle()
    {
        if (isset($_POST['expandRowKey']))
        {
            $model = new ActiveDataProvider([
                'query' => DetalleAccesorio::find()->with('accesorio.accesorioGrupo')->where(['accesorio_grupo.id' => $_POST['expandRowKey']])
            ]);
            //$model2 = $model->accesorio->accesorio
            return $this->renderPartial('_expand_row_detail', ['model'=>$model]);
            //return $_POST['expandRowKey'];
        }else
        {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }

    /**
     * Creates a new Accesorio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accesorio();
        //$accesorioGrupo = new AccesorioGrupo();
        $modelsDetalle = [new DetalleAccesorio];

        if ($model->load(Yii::$app->request->post())) {
            $modelsDetalle = Model::createMultiple(DetalleAccesorio::className());
            Model::loadMultiple($modelsDetalle, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsDetalle),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDetalle) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = ($model->save(false))) {
                        print_r($flag);
                        foreach ($modelsDetalle as $modelDetalle) {
                            $modelDetalle->accesorio_id = $model->id;
                            if (!($flag = $modelDetalle->save(false))) {
                                //$transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsDetalle' => (empty($modelsDetalle)) ? [new DetalleAccesorio] : $modelsDetalle,
        ]);

    }


    /**
     * Updates an existing Accesorio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $accesorioGrupo = new AccesorioGrupo();
        $modelsDetalle = $model->detalleAccesorio;

        if ($model->load(Yii::$app->request->post()) and $accesorioGrupo->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsDetalle, 'id', 'id');
            $modelsDetalle = Model::createMultiple(DetalleAccesorio::className(), $modelsDetalle);
            Model::loadMultiple($modelsDetalle, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDetalle, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsDetalle),
                    ActiveForm::validate($model),
                    ActiveForm::validate($accesorioGrupo)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = $accesorioGrupo->validate() && $valid;
            $valid = Model::validateMultiple($modelsDetalle) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = ($model->save(false) and $accesorioGrupo->save(false))) {
                        if (!empty($deletedIDs)) {
                            DetalleAccesorio::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsDetalle as $modelDetalle) {
                            $modelDetalle->accesorio_id = $model->id;
                            if (!($flag = $modelDetalle->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index_grupo']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
            'accesorioGrupo' => $accesorioGrupo,
            'modelsDetalle' => (empty($modelsDetalle)) ? [new DetalleAccesorio] : $modelsDetalle
        ]);
    }

    /**
     * Deletes an existing Accesorio model.
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
     * Finds the Accesorio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accesorio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accesorio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGrupo()
    {
        $query = Grupo::find(); //->with('grupo'); //->groupBy('grupo');
        
        $model = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('index_grupo', [
            'model' => $model,
        ]);
    }
}
