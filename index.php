<?php

define('API_KEY', '5123322722:AAEWqe17yA8eb5LRtnTr3P-GrtLpR2cbJ4A');

	function bot($method, $datas = []) {
		$ch = curl_init();
		$url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
	
		$res = curl_exec($ch);
		curl_close($ch);

		if (!curl_error($ch)) {
			return json_decode($res);
		} else {
			return false;
		}
	} 


$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$cid = $message->chat->id;
$cidTyp = $message->chat->type;
$miid = $message->message_id;
$name = $message->chat->first_name;
$lastname = $message->chat->last_name;
$user = $message->from->username;
$tx = $message->text;
$callback = $update->callback_query;
$mmid = $callback->inline_message_id;
$mes = $callback->message;
$mid = $mes->message_id;
$cmtx = $mes->text;
$mmid = $callback->inline_message_id;
$idd = $callback->message->chat->id;
$cbid = $callback->from->id;
$cbuser = $callback->from->username;
$data = $callback->data;
$ida = $callback->id;
$cqid = $update->callback_query->id;
$cbins = $callback->chat_instance;
$cbchtyp = $callback->message->chat->type;
$step = file_get_contents("step/$cid.step");
$menu = file_get_contents("step/$cid.menu");
$stepe = file_get_contents("step/$cbid.step");
$menue = file_get_contents("step/$cbid.menu");
mkdir("step");

$cancel = "🚫 Bekor qilish";

$keys = json_encode([
    'resize_keyboard' => true,
    'keyboard' => [
        [['text'=>"🎓 Kurslar"],],
        [['text'=>"ℹ️ Biz haqimizda"],['text'=>"📞 Aloqa"],],
        [['text'=>"📍 Manzil"],['text'=>"®️ Ro'yxatdan o'tish"],],
    ]
    ]);

$otmen = json_encode([
    'resize_keyboard' => true,
    'keyboard' => [
        [['text' => "$cancel"],],
    ]
    ]);

$manzil = json_encode([
    'inline_keyboard' => [
    [['callback_data' => "😍 Ajoyib", 'text' => "😍 Ajoyib"],['callback_data' => "😔 Bo'ladi", 'text' => "😔 Bo'ladi"],],
    ]
]);

$kurs = json_encode([
    'resize_keyboard' => true,
    'keyboard' => [
        [['text' => "✅ Ingiliz tili"], ['text' => "✅ Rus tili"],],
        [['text' => "✅ Koreys tili"], ['text' => "✅ Matematika"],],
        [['text' => "🔙 Ortga qaytish"]],
    ]
    ]);

$tasdiq = json_encode([
    'inline_keyboard' => [
        [['callback_data' => "ok", 'text' => "Ha"],['callback_data' => 'clear', 'text' => "Yo'q"],],
    ]
    ]);

if (isset($tx)) {
    ty($cid);
}

if ($tx == "/start") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "Assalomu aleykum, $name $lastname! \nSizga qanday yordam bera olishim mumkin?",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
}

if ($tx == "🎓 Kurslar") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "O'zingizni yonalishingiz boyicha fanlarni tanlang✅\nTez orada yana yangi fanlar qo'shiladi agar sizga kerakli fanlar hozirda mavjud bolmasa [@bloomedu] bilan bog'lanib o'zingizga kerakli fanni yozib qoldirishingiz mumkin biz buni albatta inobatga olamiz!",
        'parse_mode' => 'markdown',
        'reply_markup' => $kurs,
    ]);
}

if ($tx == "✅ Ingiliz tili") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Ingiliz tili kursi:* \n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. \n\n*Bonus:* Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime.",
        'parse_mode' => 'markdown',
        'reply_markup' => $kurs,
    ]);
}
if ($tx == "✅ Rus tili") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Rus tili kursi:* \n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. \n\n*Bonus:* Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime.",
        'parse_mode' => 'markdown',
        'reply_markup' => $kurs,
    ]);
}
if ($tx == "✅ Koreys tili") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Koreys tili kursi:* \n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. \n\n*Bonus:* Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime.",
        'parse_mode' => 'markdown',
        'reply_markup' => $kurs,
    ]);
}
if ($tx == "✅ Matematika") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Matematika kursi:* \n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. \n\n*Bonus:* Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime.",
        'parse_mode' => 'markdown',
        'reply_markup' => $kurs,
    ]);
}

if ($tx == "🔙 Ortga qaytish") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "Asosiy menu:",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
}


if ($tx == "ℹ️ Biz haqimizda") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Bloom o'quv markazi o'zi qanday?* \n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. \n\n👨‍🎓👩‍🎓 *Biz o'quvchilarimiz:* Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime. \n\n *So'ngi yangiliklar:* Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime.",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
}

if ($tx == "📞 Aloqa") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Biz bilan bog'lanish:* \n\n Tel: +998 99 999 9999, +998 33 333 3333 \n E-mail: bloomedu@gmail.com \n Sayt: [https://bloomedu.com] \n\n *Ijtimoiy tarmoqlar:* \n\n Telegram: [https://t.me/bloomedu] \n Facebook: [https://facebook.com] \n Instagram: [https://instagram.com]",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
}

if ($tx == "📍 Manzil") {
    bot('sendMessage', [
        "chat_id" => $cid,
        'text' => "*Bizning manzil:* \n\n Lorem ipsum dolor sit amet consectetur adipisicing elit.   Modi, fuga cum quia tempora praesentium a eveniet minus labore repudiandae expedita eius, exercitationem distinctio porro quis provident earum deserunt, explicabo maxime.",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
}

if ($tx == "📍 Manzil") {
    bot('sendLocation', [
        "chat_id" => $cid,
        "latitude" => 41.678901,
        "longitude" => 67.098456,
        'reply_markup' => $keys,
    ]);
}


function del($name) {
    array_map('unlink', glob("step/$name.*"));
}

function put($file, $what) {
    file_put_contents($file, $what);
}

function pstep($cid, $zn) {
    file_put_contents("step/$cid.step", $zn);
}

function step($cid) {
    $step = file_get_contents("step/$cid.step");
    $step += 1;
    file_put_contents("step/$cid.step", $step);
}

function nextTx($cid, $txt) {
    $step = file_get_contents("step/$cid.txt");
    file_put_contents("step/$cid.txt", "$step\n$txt");
}

function ty($ch) {
    return bot('sendChatAction', [
        'chat_id' => $ch,
        'action' => 'typing',
    ]);
}

function ACL($callbackQueryId, $text = null, $showAlert = false) {
    return bot('answerCallbackQuery', [
        'callback_query_id' => $callbackQueryId,
        'text' => $text,
        'show_alert' => $showAlert,
    ]);
}

// register

if ($tx == "®️ Ro'yxatdan o'tish") {
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Ism familyangiz\n(Masalan : Behruzbek Meliboyev)",
        'parse_mode' => 'markdown',
        'reply_markup' => $otmen,
    ]);
    pstep($cid, "0");
    put("step/$cid.menu", "register");
}

if ($step == 0 && $menu == "register") {
    if ($tx == $cancel) {} else {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "Yoshingiz\n(Masalan : 14)",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        nextTx($cid, "🎓 O'quvchi: " . $tx);
        step($cid);
    }
}

if ($step == 1 && $menu == "register") {
    if ($tx == $cancel) {} else {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "Qaysi kursimzda taxsil olmoqchisiz?\n(Masalan: Ingiliz tili, Matematika...)",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        nextTx($cid, "📅 Yosh: " . $tx);
        step($cid);
    }
}

if ($step == 2 && $menu == "register") {
    if ($tx == $cancel) {} else {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "Tanlangan kurs bo'yicha bilim darajangiz qanday?\n(Masalan: Umuman yo'q, oz-moz...)",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        nextTx($cid, "📝 Kurs nomi: " . $tx);
        step($cid);
    }
}

if ($step == 3 && $menu == "register") {
    if ($tx == $cancel) {} else {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "Telefon raqamingiz?\n(Masalan: +998 99 999 9999)",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        nextTx($cid, "🧮 Daraja: " . $tx);
        step($cid);
    }
}

if ($step == 4 && $menu == "register") {
    if ($tx == $cancel) {} else {
        if (mb_stripos($tx, "998") !== false) {
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Malumotlar muoffaqiyatli yuklandi.*\nIltimos bot faoliyatini baholang!",
                'parse_mode' => 'markdown',
                'reply_markup' => $manzil,
            ]);
            nextTx($cid, "📞 Tel: " . $tx);
            step($cid); 
        }else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "*Telefon raqamingizni kirinting! 998 kodi bilan*\n(Masalan: +998 99 999 9999)",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        }
    }
}

if (isset($data) && $stepe == "5" && $menue == "register") {
    ACL($ida);
    $base = file_get_contents("step/$cbid.txt");
    bot('sendMessage', [
        'chat_id' => $cbid,
        'text' => "<b>Sizning anketangiz tayyor bo'ldi. Hammasi yaxshi bo'lsa ma'lumotlaringizni tasdiqlang!</b>$base\n👌 Rating: $data",
        'parse_mode' => 'html',
        'reply_markup' => $tasdiq,
    ]);

    nextTx($cbid, "👌 Rating" . $data);
    step($cbid); 
}

if ($data == "ok" && $stepe == "6" && $menue == "register") {
    ACL($ida);
    $base = file_get_contents("step/$cbid.txt");
    bot('sendMessage', [
        'chat_id' => "1130942146",
        'text' => "<b>Yangi o'quvchi!</b> Username: @$cbuser <a href='tg://user?id = $cbid'>Foydalanuvchi Idisi</a><code>$base</code>",
        'parse_mode' => 'html',
        'reply_markup' => $keys,
    ]);
    bot('sendMessage', [
        'chat_id' => $cbid,
        'text' => "Anketangiz muoffaqiyatli yuborildi va siz ro'yxatdan o'tdingiz. Xodimlarimiz tez fursatda siz bilan aloqaga chiqishadi!",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
    del($cbid);
}

if ($tx == $cancel || $data == "clear") {
    ACL($ida);
    del($cbid);
    del($cid);
    if (isset($tx)) $url = "$cid";
    if (isset($data)) $url = "$cbid";
    bot('sendMessage', [
        'chat_id' => $url,
        'text' => "*Anketa bekor qilindi!*",
        'parse_mode' => 'markdown',
        'reply_markup' => $keys,
    ]);
}

?>
