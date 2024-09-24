<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SalesItem $model */

$this->title = 'Atualizar Item: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sales Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="sales-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>