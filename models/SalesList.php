<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_list".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $created_at
 * @property string $payment_type
 * @property int $monthly_installments
 * @property string $status
 * @property int $user_id
 * @property float $total_value
 * @property float|null $discount
 * @property float|null $increase
 * @property float $final_value
 *
 * @property Customer $customer
 * @property User $user
 */
class SalesList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'payment_type', 'monthly_installments', 'status', 'user_id', 'total_value', 'final_value'], 'required'],
            [['customer_id', 'monthly_installments', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['total_value', 'discount', 'increase', 'final_value'], 'number'],
            [['payment_type', 'status'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'payment_type' => 'Payment Type',
            'monthly_installments' => 'Monthly Installments',
            'status' => 'Status',
            'user_id' => 'User ID',
            'total_value' => 'Total Value',
            'discount' => 'Discount',
            'increase' => 'Increase',
            'final_value' => 'Final Value',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}