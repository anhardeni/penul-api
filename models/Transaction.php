<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property string|null $title
 * @property float|null $amount
 * @property string $type
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'number'],
            [['type'], 'required'],
            [['type'], 'string'],
            [['created_at', 'created_by', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'amount' => 'Amount',
            'type' => 'Type',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
        ];
    }
}
