<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_funcionario".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string|null $logradouro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $numero
 * @property string|null $complemento
 * @property int|null $cargo_id
 *
 * @property TbCargo $cargo
 */
class TbFuncionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf'], 'required'],
            [['cargo_id'], 'default', 'value' => null],
            [['cargo_id'], 'integer'],
            [['nome', 'logradouro', 'complemento'], 'string', 'max' => 100],
            [['cpf'], 'string', 'max' => 14],
            [['cep'], 'string', 'max' => 9],
            [['cidade', 'estado'], 'string', 'max' => 50],
            [['numero'], 'string', 'max' => 10],
            [['cpf'], 'unique'],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => TbCargo::class, 'targetAttribute' => ['cargo_id' => 'cargo_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'logradouro' => 'Logradouro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargo_id' => 'Cargo ID',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(TbCargo::class, ['cargo_id' => 'cargo_id']);
    }
}
