<?php
namespace frontend\controllers;

use yii\rest\ActiveController;

/**
 * Site controller
 */
class EventController extends ActiveController
{
    public $modelClass = 'common\models\Event';

    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        unset($actions['create'],$actions['update'],$actions['delete'], $actions['create']);

        return $actions;
    }


}
