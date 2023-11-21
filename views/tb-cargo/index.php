<?php

use app\models\TbCargo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cargo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cadastrar Cargo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cargo_id',
            'nome_cargo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TbCargo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'cargo_id' => $model->cargo_id]);
                 }
            ],
        ],
    ]); ?>


</div>
