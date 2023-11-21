<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbCargo $model */

$this->title = 'Cadastrar Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cargo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
