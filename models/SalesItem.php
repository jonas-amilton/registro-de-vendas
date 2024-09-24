<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_item".
 *
 * @property int $id
 * @property string $name
 * @property float $sale_price
 * @property float $purchase_price
 * @property string $created_at
 * @property int $stock_quantity
 * @property int $customer_id
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
            [['name', 'sale_price', 'purchase_price', 'stock_quantity', 'customer_id'], 'required'],
            [['sale_price', 'purchase_price'], 'number'],
            [['created_at'], 'safe'],
            [['stock_quantity', 'customer_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sale_price' => 'Sale Price',
            'purchase_price' => 'Purchase Price',
            'created_at' => 'Created At',
            'stock_quantity' => 'Stock Quantity',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }
}
