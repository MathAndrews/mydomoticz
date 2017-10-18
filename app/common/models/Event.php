<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property integer $module_id
 * @property integer $status
 * @property string $type
 * @property string $date
 * @property string $time
 * @property string $randomness
 * @property string $command
 * @property string $days
 *
 * @property Module $module
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'type', 'date', 'time', 'days'], 'required'],
            [['module_id', 'status'], 'integer'],
            [['date', 'time'], 'safe'],
            [['days'], 'string'],
            [['type', 'randomness', 'command'], 'string', 'max' => 255],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module_id' => 'Module ID',
            'status' => 'Status',
            'type' => 'Type',
            'date' => 'Date',
            'time' => 'Time',
            'randomness' => 'Randomness',
            'command' => 'Command',
            'days' => 'Days',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'module_id']);
    }
}
