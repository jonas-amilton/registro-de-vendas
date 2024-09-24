<?php

use app\models\SalesList;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SalesList $model */

$this->title = 'Registrar nova Venda';
$this->params['breadcrumbs'][] = ['label' => 'Sales Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers,
        'itemsForSale' => $itemsForSale
    ]) ?>

</div>