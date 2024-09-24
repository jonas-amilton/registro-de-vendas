<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SalesList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sales-list-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'sales-form',
        ],
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput([
        'value' => Yii::$app->user->identity->id,
        'readonly' => true
    ])->label("Vendedor: " . Yii::$app->user->identity->username); ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
        $customers,
        ['prompt' => 'Selecione um cliente']
    )->label('Cliente') ?>

    <?= $form->field($model, 'sales_item_id')->dropDownList(
        $itemsForSale,
        [
            'prompt' => 'Selecione um item de venda',
            'id' => 'sales_item_id'
        ]
    )->label('Item de Venda') ?>

    <?= $form->field($model, 'payment_type')->dropDownList(
        [
            'Cartão de Credito' => 'Cartão de Credito',
            'PIX' => 'PIX',
            'Em dinheiro' => 'Em dinheiro',
        ],
        [
            'prompt' => 'Selecione um método de Pagamento',
            'id' => 'payment_type'
        ]
    ) ?>

    <?= $form->field($model, 'installments')->dropDownList(
        [
            '1' => '1x (À Vista)',
            '2' => '2x (Sem Juros)',
            '3' => '3x (Sem Juros)',
            '4' => '4x (Sem Juros)',
            '5' => '5x (Sem Juros)',
            '6' => '6x (Juros de 5%)'
        ],
        [
            'prompt' => 'Selecione o número de parcelas',
            'id' => 'installments',
        ]
    ) ?>

    <?= $form->field($model, 'monthly_installments')->textInput([
        'maxlength' => true,
        'id' => 'saleslist-monthly_installments',
    ])->label('Parcelas Mensais') ?>

    <?= $form->field($model, 'total_value')->textInput([
        'maxlength' => true,
        'id' => 'total_value',
    ])->label('Valor Total') ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>