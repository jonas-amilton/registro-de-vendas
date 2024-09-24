<?php

use yii\db\Migration;

/**
 * Class m240924_054533_create_sales_item
 */
class m240924_054533_create_sales_item_table extends Migration
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
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'stock_quantity' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sales_item}}');
    }
}