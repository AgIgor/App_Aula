<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    class Mensagem{
        private $para = '';
        private $assunto = '';
        private $mensagem = ''; 

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function MensagemValida(){
            if(empty($this->para)||empty($this->assunto)||empty($this->mensagem)){
                return false;
            }
            return true;
        }
    }//end class Mensagem

    $mensagem = new Mensagem();
    $mensagem->__set('para',$_POST['para']);
    $mensagem->__set('assunto',$_POST['assunto']);
    $mensagem->__set('mensagem',$_POST['mensagem']);


    if(!$mensagem->MensagemValida()){
      header('Location: /app_send_mail/index.php?status=error'); 
      die;
    }

    //print_r($mensagem);

    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'apptesteaula@gmail.com';                     //SMTP username
        $mail->Password   = '242018igor';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('apptesteaula@gmail.com','Send Mailer');//,'Remetente');
        $mail->addAddress($mensagem->__get('para'));//,'Destinatario');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header('Location: /app_send_mail/sucesso.php?status=ok'); 
    } catch (Exception $e) {
        echo "Detalhes do erro: {$mail->ErrorInfo}";
    }




    