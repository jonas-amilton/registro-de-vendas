<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Home | Registro de Vendas';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Bem Vindo!</h1>

        <p class="lead">Sistema de Registro de Vendas.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h2>Clientes Registrados</h2>

                        <p class="text-danger">Gerencie os clientes registrados.</p>

                        <p><a class="btn btn-outline-secondary" href="<?= Url::to('/customer'); ?>">Acessar
                                &raquo;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h2>Itens Registrados</h2>

                        <p class="text-danger">Gerencie os itens registrados.</p>

                        <p><a class="btn btn-outline-secondary" href="<?= Url::to('/sales-item'); ?>">Acessar
                                &raquo;</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h2>Lista de Vendas</h2>

                        <p class="text-danger">Gerencie as vendas registradas.</p>

                        <p><a class="btn btn-outline-secondary" href="<?= Url::to('/sales-list'); ?>">Acessar
                                &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>