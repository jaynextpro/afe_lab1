<?php

namespace app\models;

use Yii;
use yii\base\Model;

class InicioForm extends Model
{
    public $valor_a;
    public $valor_b;
    public $operacion;

    public function rules(
)
    {
        return [
            [['valor_a', 'valor_b', 'operacion'], 'required', 'message' => 'Este campo no puede estar vacio'],
            [['valor_a', 'valor_b'], 'number', 'message' => 'Este campo debe ser numerico'],
        ];
    }
}

?>