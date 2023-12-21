<pre><code>&lt;?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6314437772:AAFg0tPNNFPCRsczKRCYVHCRDqdXJYpMjpE";

//Сюда вставляем chat_id
$chat_id = "-4002713721";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $telegram = ($_POST['telegram']);
    $message = ($_POST['message']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'email:' => $email,
        'Telegram:' => $telegram,
        'Сообщение:' => $message,
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Все ок погнали');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}

?>