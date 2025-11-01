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

    $body = '<h1>Заявка с формы "Хочу стать клиентом!"</h1>';
    if(trim(!empty($_POST['company']))){
        $body.='<p><strong>Чем занимается:</strong> '.$_POST['company'].'</p>';
    }
    if(trim(!empty($_POST['difficulties']))){
        $body.='<p><strong>С какими трудностями столкнулись:</strong> '.$_POST['difficulties'].'</p>';
    }
    if(trim(!empty($_POST['task']))){
        $body.='<p><strong>Задачи:</strong> '.$_POST['task'].'</p>';
    }
    if(trim(!empty($_POST['expectations']))){
        $body.='<p><strong>Ожидания:</strong> '.$_POST['expectations'].'</p>';
    }
    if(trim(!empty($_POST['money']))){
        $body.='<p><strong>Бюджет:</strong> '.$_POST['money'].'</p>';
    }
    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['tel']))){
        $body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['commit']))){
        $body.='<p><strong>Комментарий:</strong> '.$_POST['commit'].'</p>';
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



