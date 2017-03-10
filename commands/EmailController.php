<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;
use Yii;
use yii\console\Controller;
use app\models\CLient;
use app\models\Reserve;
/**
 * Send email 24 hours left
 *
 *
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EmailController extends Controller
{
    /**
     * 
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $date=date('Y-m-d');
        $reserves=Client::find()->select(['DISTINCT(reserve_id),names,lastnames,email,phone,cellphone,number_players,total_price'])->joinWith(['reserve'])->where(['reserve.status'=>'CLOSE'])->andWhere(['DATE_FORMAT(reserve.start_date,"%Y-%m-%d")' => $date ])->all();
        if($reserves){
	        foreach($reserves as $reserve){

	        	if($this->Sendemail($reserve)){
	        		echo "envió";
	        	}

	        }
        }
        die($aux);
    }
        protected function Sendemail($client){
                $email=  Yii::$app->mailer->compose('automatic_confirm', [
                'model' => $client,'fecha'=>$this->fecha($client->reserve->start_date)
                ])->setFrom('info@exit.com.ec')
                ->setTo([$client->email])
                ->setSubject("Falta poco para que empieze tu aventura.".$client->id)
                ->send();
                if($email){
                	return true;
                }else{
                	return false;
                }
	}


		 protected function fecha($fecha) {
		  $fecha = substr($fecha, 0, 10);
		  $numeroDia = date('d', strtotime($fecha));
		  $dia = date('l', strtotime($fecha));
		  $mes = date('F', strtotime($fecha));
		  $anio = date('Y', strtotime($fecha));
		  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
		}

}
