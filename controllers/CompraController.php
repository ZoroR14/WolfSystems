<?php

namespace app\controllers;

use Yii;
use app\models\Compra;
use app\models\CompraSearch;
use app\models\CompraDetalle;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\proveedor;

/**
 *
 * CompraController implements the CRUD actions for compra model.
 */
class CompraController extends Controller
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
     * Lists all compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single compra model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Compra();
        $modelsCompraDetalle = [new CompraDetalle];
        $proveedor = \yii\helpers\ArrayHelper::map(\app\models\proveedor::find()->all(),"id", "empresa");

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $modelsCompraDetalle = Model::createMultiple(CompraDetalle::classname());
            Model::loadMultiple($modelsCompraDetalle, Yii::$app->request->post());
    
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsCompraDetalle) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsCompraDetalle as $modelCompraDetalle) {
                            $modelCompraDetalle->compra_id = $model->id;
                            if (! ($flag = $modelCompraDetalle->save(false))) {
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
                'modelsCompraDetalle' => (empty($modelsCompraDetalle)) ? [new CompraDetalle] : $modelsCompraDetalle,
                'proveedor' => $proveedor,
            ]);
    }

    /**
     * Updates an existing compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsCompraDetalle = $model->compraDetalles;
        $proveedor = \yii\helpers\ArrayHelper::map(\app\models\proveedor::find()->all(),"id", "empresa");

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelsCompraDetalle, 'id', 'id');
            $modelsCompraDetalle = Model::createMultiple(CompraDetalle::classname(), $modelsCompraDetalle);
            Model::loadMultiple($modelsCompraDetalle, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsCompraDetalle, 'id', 'id')));

            
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsCompraDetalle) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            CompraDetalle::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsCompraDetalle as $modelCompraDetalle) {
                            $modelCompraDetalle->compra_id = $model->id;
                            if (! ($flag = $modelCompraDetalle->save(false))) {
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
                'modelsCompraDetalle' => (empty($modelsCompraDetalle)) ? [new CompraDetalle] : $modelsCompraDetalle,
                'proveedor' => $proveedor
                
            ]);
    }

    /**
     * Deletes an existing compra model.
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
     * Finds the compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Compra::findOne($id);
        if ($model) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
