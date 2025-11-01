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

    $body = '<h1>Заявка с Квиза!"</h1>';

    
  
    if(trim(!empty($_POST['seo']))){
        $body.='<p><strong>Какая у вас цель:</strong> SEO продвижение</p>';
    }
    if(trim(!empty($_POST['web-site']))){
        $body.='<p><strong>Какая у вас цель:</strong> Веб-сайт</p>';
    }
    if(trim(!empty($_POST['mobile-app']))){
        $body.='<p><strong>Какая у вас цель:</strong> Мобильное приложение</p>';
    }
    if(trim(!empty($_POST['design']))){
        $body.='<p><strong>Какая у вас цель:</strong> Веб-дизайн</p>';
    }


    //второй вопрос 
    if(trim(!empty($_POST['ecommerce']))){
        $body.='<p><strong>Вид вашей деятельности:</strong> Продажа товаров</p>';
    }
    if(trim(!empty($_POST['services']))){
        $body.='<p><strong>Вид вашей деятельности:</strong> Услуги</p>';
    }
    if(trim(!empty($_POST['production']))){
        $body.='<p><strong>Вид вашей деятельности:</strong> Производство</p>';
    }
    if(trim(!empty($_POST['finance']))){
        $body.='<p><strong>Вид вашей деятельности:</strong> Финансы</p>';
    }
    if(trim(!empty($_POST['consulting']))){
        $body.='<p><strong>Вид вашей деятельности:</strong> Консалтинг</p>';
    }
    if(trim(!empty($_POST['other']))){
        $body.='<p><strong>Вид вашей деятельности:</strong> Другое</p>';
    }

    //третий вопрос 
    if(trim(!empty($_POST['direct']))){
        $body.='<p><strong>Дополнительные услуги:</strong> Яндекс Директ</p>';
    }
    if(trim(!empty($_POST['filling']))){
        $body.='<p><strong>Дополнительные услуги:</strong> Наполнение сайта</p>';
    }
    if(trim(!empty($_POST['crm']))){
        $body.='<p><strong>Дополнительные услуги:</strong> Интеграция с CRM</p>';
    }
    if(trim(!empty($_POST['smm']))){
        $body.='<p><strong>Дополнительные услуги:</strong> SMM</p>';
    }
    if(trim(!empty($_POST['target']))){
        $body.='<p><strong>Дополнительные услуги:</strong> Таргетированная реклама</p>';
    }
    if(trim(!empty($_POST['marketing']))){
        $body.='<p><strong>Дополнительные услуги:</strong> Маркетинг</p>';
    }
    if(trim(!empty($_POST['seo']))){
        $body.='<p><strong>ВДополнительные услуги:</strong> СЕО продвижение</p>';
    }
    if(trim(!empty($_POST['photo']))){
        $body.='<p><strong>Дополнительные услуги:</strong> Фото и видео контент</p>';
    }

    //четвертый вопрос 
    if(trim(!empty($_POST['promocode']))){
        $body.='<p><strong>Промокод:</strong> '.$_POST['promocode'].'</p>';
    }
    
    //пятый вопрос 
    if(trim(!empty($_POST['quiz-name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['quiz-name'].'</p>';
    }
    if(trim(!empty($_POST['quiz-tel']))){
        $body.='<p><strong>Телефон:</strong> '.$_POST['quiz-tel'].'</p>';
    }
    if(trim(!empty($_POST['quiz-email']))){
        $body.='<p><strong>Email:</strong> '.$_POST['quiz-email'].'</p>';
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



