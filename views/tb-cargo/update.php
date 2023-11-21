<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbCargo $model */

$this->title = 'Update Tb Cargo: ' . $model->cargo_id;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cargo_id, 'url' => ['view', 'cargo_id' => $model->cargo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-cargo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
