<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SalesItem $model */

$this->title = 'Cadastrar Item para Venda';
$this->params['breadcrumbs'][] = ['label' => 'Sales Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>