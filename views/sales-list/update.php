<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SalesList $model */

$this->title = 'Update Sales List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers,
        'itemsForSale' => $itemsForSale
    ]) ?>

</div>