<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';


    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru','phpmailer/language/');
    $mail->IsHTML(true);



    //От кого письмо
    $mail->setFrom('info@primecoder.ru','PrimeCoder'); //От кого отправить
    $mail->addAddress('info@primecoder.ru'); //Кому отправить
    $mail->Subject = 'Срочная заявка с сайта!';


    //Тело письма

    $body = '<h1>Заявка с формы "Обратная связь"</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['tel']))){
        $body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
    }
    if(trim(!empty($_POST['question']))){
        $body.='<p><strong>Сообщение:</strong> '.$_POST['question'].'</p>';
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
    echo json_encode($response)
    
    
    ?>