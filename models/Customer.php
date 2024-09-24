<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $company_name
 * @property string $trade_name
 * @property string $address
 * @property string $address_number
 * @property float|null $credit_limit
 * @property string $cpf_cnpj
 * @property string|null $rg_ie
 * @property string|null $phone_number
 * @property string $city
 *
 * @property SalesItem[] $salesItems
 * @property SalesList[] $salesLists
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'trade_name', 'address', 'address_number', 'cpf_cnpj', 'city'], 'required'],
            [['credit_limit'], 'number'],
            [['company_name', 'trade_name', 'address'], 'string', 'max' => 255],
            [['address_number'], 'string', 'max' => 10],
            [['cpf_cnpj', 'rg_ie', 'phone_number'], 'string', 'max' => 20],
            [['city'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Nome da Empresa',
            'trade_name' => 'Nome Fantasia',
            'address' => 'Endereço',
            'address_number' => 'Número do Endereço',
            'credit_limit' => 'Limite de Crédito',
            'cpf_cnpj' => 'Cpf/Cnpj',
            'rg_ie' => 'Rg/Ie',
            'phone_number' => 'Número de Telefone',
            'city' => 'Cidade',
        ];
    }

    /**
     * Gets query for [[SalesItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesItems()
    {
        return $this->hasMany(SalesItem::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[SalesLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesLists()
    {
        return $this->hasMany(SalesList::class, ['customer_id' => 'id']);
    }
}