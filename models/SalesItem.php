<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_item".
 *
 * @property int $id
 * @property string $name
 * @property float $sale_price
 * @property string $created_at
 * @property int $stock_quantity
 *
 * @property Customer $customer
 */
class SalesItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sale_price', 'stock_quantity'], 'required'],
            [['sale_price'], 'number'],
            [['created_at'], 'safe'],
            [['stock_quantity'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'sale_price' => 'Preço de Venda',
            'created_at' => 'Criado Em',
            'stock_quantity' => 'Quantidade em Estoque',
        ];
    }
}