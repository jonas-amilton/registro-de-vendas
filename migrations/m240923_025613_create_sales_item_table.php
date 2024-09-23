<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sales_item}}`.
 */
class m240923_025613_create_sales_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sales_item}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'sale_price' => $this->decimal(10, 2)->notNull(),
            'purchase_price' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'stock_quantity' => $this->integer()->notNull(),
            'customer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-sales_item-customer_id',
            '{{%sales_item}}',
            'customer_id',
            '{{%customer}}',
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
        $this->dropForeignKey('fk-sales_item-customer_id', '{{%sales_item}}');

        $this->dropTable('{{%sales_item}}');
    }
}