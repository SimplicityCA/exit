<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactFormp extends Model
{
    public $name;
    public $email;
    public $body;
    public $verifyCode;
    public $medio;
	public $office;
	public $cellphone;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'medio', 'body','office','cellphone'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['office','cellphone'], 'number'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'No soy un robot',
            'name' => 'Nombres y Apellidos',
            'medio' => 'Medio',
            'body' =>'Descripción del Medio',
            'office' => 'Telefono Oficina',
            'cellphone' => 'Celular'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body."<br>".$this->medio."<br>".$this->office."<br>".$this->cellphone)
                ->send();

            return true;
        }
        return false;
    }
}
