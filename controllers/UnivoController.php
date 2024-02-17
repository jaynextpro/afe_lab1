<?php 


namespace app\controllers;

use app\models\InicioForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\Controller;

class UnivoController extends Controller
{
    public function actionIndex()
    {
        $h1 = "UNIVO - Universidad de Oriente";
        $mensaje = "Yes, it is";
        $datetime = new \DateTime();

        return $this->render('index', [
            'h1' => $h1,
            'mensaje' => $mensaje,
            'datetime' => $datetime
        ]);
    }

    public function actionOperaciones()
    {
        $model = new InicioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $resultado = $this->ejecutarOperacion($model->valor_a, $model->valor_b, $model->operacion);
            $respuesta = $resultado == 'No se puede dividir por 0' ? $resultado : ("El resultado es: " . $resultado);

            return $this->render('operaciones', ['model' => $model, 'respuesta' => $respuesta]);
        }

        return $this->render('operaciones', ['model' => $model]);
    }


    protected function ejecutarOperacion($number1, $number2, $operation)
    {
        switch ($operation) {
            case 'suma':
                return $number1 + $number2;
            case 'resta':
                return $number1 - $number2;
            case 'multiplicacion':
                return $number1 * $number2;
            case 'division':
                return $number2 != 0 ? $number1 / $number2 : 'No se puede dividir por 0';
            default:
                return 'Operacion invalida';
        }
    }
}
?>