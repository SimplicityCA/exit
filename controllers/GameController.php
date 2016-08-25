<?php

namespace app\controllers;

use Yii;
use app\models\Game;
use app\models\Reserve;
use app\models\Client;
use app\models\GameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
/**
 * GameController implements the CRUD actions for Game model.
 */
class GameController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * Displays a single Game model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout="main2";
        $events = array();
        $aux=Reserve::find()->where(['game_id'=>$id,'status'=>'OPEN'])->all();
foreach($aux as $k => $reserve){
    $date=date('Y-m-d H:i:s',strtotime($reserve->start_date));
     $date2=date('Y-m-d\Th:i:s\Z',strtotime($reserve->end_date));
   $Event = new \yii2fullcalendar\models\Event();
  $Event->id = $reserve->id;
  $Event->title = $reserve->description;
  $Event->start = $reserve->start_date;
    $Event->end = $reserve->end_date;
    $Event->url = Url::to(['game/reserve','id'=>$reserve->id]);
  $events[] = $Event;   
}

 
        return $this->render('view', [
            'model' => $this->findModel($id),'events'=>$events
        ]);
    }
    public function actionReserve($id)
    {
        $this->layout="main2";
        $reserve=Reserve::findOne($id);
        $model=New Client;
        $model->reserve_id=$id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->pay_method=="PAYPAL"){
                        $item=new Item();
                        $item->setName($reserve->game->title." ".$reserve->game->subtitle)
                            ->setCurrency('USD')
                            ->setQuantity(1)
                            ->setPrice($model->total_price)
                            ->setSku($model->id);
                        $items[]=$item;
                                    $apiContext = $this->getApiContext();

            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $itemList = new ItemList();
            $itemList->setItems($items);

            $details = new Details();
            $details->setSubtotal($model->total_price);

            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal($model->total_price)
                ->setDetails($details);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Reserva Juego Exit")
                ->setInvoiceNumber($this->generateRandomString(10));

            $baseUrl = Url::base(true);
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl("$baseUrl/game/congrats?id=".$model->id)
                ->setCancelUrl("$baseUrl/game/view?id=".$reserve->game_id);

            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($apiContext);
            } catch (Exception $ex) {
                print_r($ex);
                exit(1);
            }

            $approvalUrl = $payment->getApprovalLink();
            /* --- */
           // var_dump($items); 
            $reserve=Reserve::findOne($model->reserve_id);
            $reserve->status='CLOSE';
            $reserve->save();
            return $this->redirect($approvalUrl);
            }
            $reserve=Reserve::findOne($model->reserve_id);
            $reserve->status='CLOSE';
            $reserve->save();
            return $this->redirect(['congrats', 'id' => $model->id]);
        } else {
            return $this->render('reserve', [
                'model' => $model,'reserve'=>$reserve
            ]);
        }
    }
    private function getApiContext()
    {

        $clientId = 'AatTLKio46ZF9wUTx86WbYFk3OWMuCtzS_zKXf0S8CEfh3w7y4qpQeDZycGfmZ9O0_KZCsCjPLUXVCic';
        $clientSecret = 'EB5a1uCkXOQpyDnAG8IQwM0GSxNHujeVcknVqVp93q-sJ6INOu5Xp_Pn8xgdOPHymJdkiAtcI4AmIXUI';

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $clientId,
                $clientSecret
            )
        );

        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                //'mode' => 'live',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'validation.level' => 'log',
                'cache.enabled' => true,
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
                // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
            )
        );
        return $apiContext;
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function actionCongrats($id){

        $this->layout="main2";
        $model=Client::findOne($id);
        if(isset($_GET['PayerID'])){
                    $payerId=$_GET['PayerID'];
        $paymentId=$_GET['paymentId'];
        $apiContext = $this->getApiContext();
        $paymentExecution = new PaymentExecution();
        $paymentExecution->setPayerId($payerId);
        $payment = new Payment();
        $payment->setId($paymentId);
        try {
            $payment = $payment->execute($paymentExecution, $apiContext);
            // $response = $payment->toJSON();
            $purchase=new Purchase;
            $payer_info=$payment->payer->payer_info;
            $transaction=$payment->transactions[0];
            $purchase->first_name=$payer_info->first_name;
            $purchase->last_name=$payer_info->last_name;
            $purchase->email=$payer_info->email;
            $purchase->address=$payer_info->shipping_address->line1.' '.$payer_info->shipping_address->line2;
            $purchase->city=$payer_info->shipping_address->city;
            $purchase->state=$payer_info->shipping_address->state;
            $purchase->postal_code=$payer_info->shipping_address->postal_code;
            $purchase->country_code=$payer_info->shipping_address->country_code;
            $purchase->recipient_name=$payer_info->shipping_address->recipient_name;
            $purchase->total=$transaction->amount->total;
            $items='';
            $quantities='';
            foreach ($transaction->item_list->items as $item) {
                $items.=$item->sku.',';
                $quantities.=$item->quantity.',';
            }
            $purchase->items=$items;
            $purchase->quantities=$quantities;
            $purchase->creation_date=date('Y-m-d H:i:s');
            $purchase->save();
            // print_r($payment);die();
        } catch (Exception $e) {
            print_r($e);die();
        }
        }
        return $this->render('congrats', [
                'model' => $model
            ]);
    }


    /**
     * Finds the Game model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Game the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Game::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
