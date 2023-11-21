<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_cargo".
 *
 * @property int $cargo_id
 * @property string $nome_cargo
 *
 * @property TbFuncionario[] $tbFuncionarios
 */
class TbCargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_cargo'], 'required'],
            [['nome_cargo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cargo_id' => 'Cargo ID',
            'nome_cargo' => 'Nome Cargo',
        ];
    }

    /**
     * Gets query for [[TbFuncionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbFuncionarios()
    {
        return $this->hasMany(TbFuncionario::class, ['cargo_id' => 'cargo_id']);
    }
}
