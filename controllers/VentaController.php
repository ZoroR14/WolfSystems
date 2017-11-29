<?php

namespace app\controllers;

use Yii;
use app\models\Venta;
use app\models\VentaDetalle;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\Model;
use app\models\VentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;


/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
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
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VentaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $ventadetalles = $model->ventadetalles;
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'ventadetalles' => $ventadetalles,
        ]);
    }

    /**
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venta();
        $modelsVentaDetalle = [new VentaDetalle];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
             $modelsVentaDetalle = Model::createMultiple(VentaDetalle::classname());
            Model::loadMultiple($modelsVentaDetalle, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsVentaDetalle) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsVentaDetalle as $modelVentaDetalle) {
                            $modelVentaDetalle->venta_id = $model->id;
                            if (! ($flag = $modelVentaDetalle->save(false))) {
                                $transaction->rollBack();
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
                'modelsVentaDetalle' => (empty($modelsVentaDetalle)) ? [new VentaDetalle] : $modelsVentaDetalle,
            ]);
    }
    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $modelsVentaDetalle = $model->ventadetalles;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            
            $oldIDs = ArrayHelper::map($modelsVentaDetalle, 'id', 'id');
            $modelsVentaDetalle = Model::createMultiple(VentaDetalle::classname(), $modelsVentaDetalle);
            Model::loadMultiple($modelsVentaDetalle, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsVentaDetalle, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsVentaDetalle) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            VentaDetalle::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsVentaDetalle as $modelVentaDetalle) {
                            $modelVentaDetalle->venta_id = $model->id;
                            if (! ($flag = $modelVentaDetalle->save(false))) {
                                $transaction->rollBack();
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
         return $this->render('update', [
                'model' => $model,
             'modelsVentaDetalle' => (empty($modelsVentaDetalle)) ? [new VentaDetalle] : $modelsVentaDetalle
            ]);
        }

    /**
     * Deletes an existing Venta model.
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
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
