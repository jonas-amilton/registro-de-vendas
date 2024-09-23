<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sales_list}}`.
 */
class m240923_031013_create_sales_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sales_list}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'payment_type' => $this->string(50)->notNull(),
            'monthly_installments' => $this->integer()->notNull(),
            'status' => $this->string(50)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'total_value' => $this->decimal(10, 2)->notNull(),
            'discount' => $this->decimal(10, 2)->defaultValue(0.00),
            'increase' => $this->decimal(10, 2)->defaultValue(0.00),
            'final_value' => $this->decimal(10, 2)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-sales_list-customer_id',
            '{{%sales_list}}',
            'customer_id',
            '{{%customer}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sales_list-user_id',
            '{{%sales_list}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sales_list-user_id', '{{%sales_list}}');
        $this->dropForeignKey('fk-sales_list-customer_id', '{{%sales_list}}');

        $this->dropTable('{{%sales_list}}');
    }
}