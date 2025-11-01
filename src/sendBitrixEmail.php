<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\src\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';



    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'PHPMailer/language/');
    $mail->IsHTML(true);

    //От кого письмо
    $mail->setFrom('info@primecoder.ru', 'Сайт PrimeCoder'); 
    //От кого отправить
    $mail->addAddress('info@primecoder.ru'); 
    //Кому отправить
    $mail->Subject = 'Срочная заявка с сайта!';


    //Тело письма

    $body = '<h1>Заявка с формы "Хочу заказать сайт на 1С Битрикс!"</h1>';
    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['tel']))){
        $body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
    }
  

    $mail->Body = $body;

    //Отправляем

    if (!$mail->send()){
        $message = 'Ошибка';
    } else {
        $message = 'Заявка отправлена!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
    
    
?>



