<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    protected $_ci;
    protected $email_pengirim = 'desasidodadipagardewa@gmail.com';
    protected $nama_pengirim  = 'Desa Sidodadi Pagar Dewa';
    protected $password       = 'trilypwbpjmoornv';

    public function __construct()
    {
        $this->_ci = &get_instance();
            
        require_once(APPPATH.'third_party/phpmailer/Exception.php');
        require_once(APPPATH.'third_party/phpmailer/PHPMailer.php');
        require_once(APPPATH.'third_party/phpmailer/SMTP.php');
    }

    public function send($data)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $this->email_pengirim; 
        $mail->Password = $this->password; 
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
            
        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
        $mail->addAddress($data['email_penerima'], '');
        $mail->isHTML(true);

        $mail->Subject = $data['subjek'];
        $mail->Body = $data['content'];

        $send = $mail->send();

        if($send) {
            $response = array('status'=>'Sukses', 'message'=>'Email berhasil dikirim');
        } else {
            $response = array('status'=>'Gagal', 'message'=>'Email gagal dikirim');
        }

        return $response;
    }

}
