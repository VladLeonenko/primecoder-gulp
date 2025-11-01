<?php
    // require_once 'conect.php';
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $text = $_POST['text'];
    $company = $_POST['company'];
    $task = $_POST['task'];
    $money = $_POST['money'];


//Обработка полученных данных

    $name = htmlspecialchars($name);  //преобразование символов в сущности
    $surname = htmlspecialchars($surname);
    $email = htmlspecialchars($email);
    $tel = htmlspecialchars($tel);
    $text = htmlspecialchars($text);
    $company = htmlspecialchars($company);
    $task = htmlspecialchars($task);
    $money = htmlspecialchars($money);
    
    

    $name = urldecode($name);  //декодирование URL
    $surname = urldecode($surname);
    $email = urldecode($email);
    $tel = urldecode($tel);
    $text = urldecode($text);
    $company = urldecode($company);
    $task = urldecode($task);
    $money = urldecode($money);

    $name = trim($name);  // удаление пробельных символов с обеих сторон
    $surname = trim($surname);
    $email = trim($email);
    $tel = trim($tel);


    // $sql = "INSERT INTO form_contact($name, $surname, $email, $tel, $text, $company)";
    $to = "vladleo2020@gmail.com";
    $subject = "Новое письмо с сайта";
    
//   $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
    $headers .= "From: От кого письмо <no-reply@primecoder.ru>\r\n"; 
    
   
//   if(mail("lait@mail.ru", "My Subject", "Line 1\nLine 2\nLine 3")) echo "message send";
// else echo "message not send";
   $msg = "Письмо успешно отправлено!";
  if( mail($to, $subject,
        "Имя:  $name \n
         Фамилия:  $surname \n
         Почта:  $email \n
         Задача:  $text \n
         Компания:  $company \n
         Задача:  $task \n
         Бюджет:  $money \n
         Телефон:  $tel",
         $headers)
        ){
             function phpAlert($msg) {
                echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }
            header("Location: success.html");
           
           
        } else {
            echo ('Есть ошибки! Проверьте данные');
        }
        


?>