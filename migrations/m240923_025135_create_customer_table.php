<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m240923_025135_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'company_name' => $this->string(255)->notNull(),
            'trade_name' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'address_number' => $this->string(10)->notNull(),
            'credit_limit' => $this->decimal(10, 2),
            'cpf_cnpj' => $this->string(20)->notNull(),
            'rg_ie' => $this->string(20),
            'phone_number' => $this->string(20),
            'city' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer}}');
    }
}