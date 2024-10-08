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
 * @property int $installments
 * @property int $user_id
 * @property float $total_value
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
            [['customer_id', 'payment_type', 'monthly_installments', 'installments', 'user_id', 'sales_item_id', 'total_value'], 'required'],
            [['customer_id', 'monthly_installments', 'installments', 'user_id', 'sales_item_id'], 'integer'],
            [['created_at'], 'safe'],
            [['total_value'], 'number'],
            [['payment_type'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['sales_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => SalesItem::class, 'targetAttribute' => ['sales_item_id' => 'id']],
            [['installments'], 'default', 'value' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'ID do Cliente',
            'created_at' => 'Criado em',
            'payment_type' => 'Tipo de Pagamento',
            'monthly_installments' => 'Valor da Parcela',
            'installments' => 'Quantidade de Parcelas',
            'user_id' => 'ID do Vendedor',
            'total_value' => 'Total',
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

    /**
     * Gets query for [[SalesItem]].
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getSalesItem()
    {
        return $this->hasOne(SalesItem::class, ['id' => 'sales_item_id']);
    }
}