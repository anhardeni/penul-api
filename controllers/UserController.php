<?php

namespace app\controllers;

use yii\rest\ActiveController;


/**
 * user controller
 */
class UserController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\models\User';

    //    delete default actions

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Expose-Headers' => ['X-Pagination-Total-Count', 'X-Pagination-Page-Count', 'X-Pagination-Current-Page', 'X-Pagination-Per-Page'],
            ],
        ];

        $behaviors['authenticator'] = $auth;
        $behaviors['authenticator']['except'] = ['options'];
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBearerAuth::className(),
            'except' => [
                'index'
            ]
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
    //    $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        unset(
          //  $actions['create'],
         //   $actions['view'],
         //   $actions['update'],
            $actions['delete']
         //   $actions['index']
        );
        return $actions;
    }

    protected function verbs()

    {

        return [

            'index' => ['GET', 'HEAD', 'OPTIONS'], //instead of  'index' => ['GET', 'HEAD']
            'view' => ['GET', 'HEAD', 'OPTIONS'],
            'create' => ['POST', 'OPTIONS'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];

    

    }
//     example for search and sort
//     u can access it by using http://localhost/yii2-micro-api/user?UserSearch[name]=hadi&sort=id
//     note that u have to create UserSearch first u can do that by using gii crud
    
    //  public function actions()
    //  {
    //  $actions = parent::actions();
    //  $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
    //  return $actions;
    //  }
    
     public function prepareDataProvider()
     {
     $searchModel = new \app\models\UserSearch();
     return $searchModel->search(\Yii::$app->request->queryParams);
     }


     public function actionLogin()
   {
      $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors,
            'status' => 'success',
            'message' => 'LOGINS_USER_SUCCESS!',
        ];
    }
     
}
