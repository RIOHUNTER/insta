<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'] . $accounts[$screen]['sessionid'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 0;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$RIO = 0;
$true = 0;
$false = 0;
$NotBussines = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"- *π²π·π΄π²πΊπ΄π³ π±π ππΈπΎ π·ππ½ππ΄π π΅πΈοΈ
     πΌπ π²π·: @A_5CT π³π΄ππ΄π»πΎπΏ: @N_W_9 π΅πΈοΈ*",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>' π½ππΌπ±π΄π πππ΄ππ β: '.$i,'callback_data'=>'fgf']],
                [['text'=>'πΈπ½ πππ΄π β: '.$user,'callback_data'=>'fgdfg']],
                [['text'=>"Gmail: $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],
                [['text'=>"Aol : $RIO",'callback_data'=>'fgjjjvf']],
                [['text'=>'π°ππ°πΈπ»π°π±π»π΄:'.$true,'callback_data'=>'gj']],
                [['text'=>'π½πΎπ π°ππ°πΈπ»π°π±π»π΄: '.$false,'callback_data'=>'dghkf'],['text'=>'π½πΎπ π±πππΈπ½π΄ππ: '.$NotBussines,'callback_data'=>'dgdge']]
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false and !is_string($info)) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|yAhoo|aol|aOl|Aol)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
            $za +=1;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'aol')){ 
                               	$akilaol = 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => " πΌππΌπππΌπ½ππ πππππΌ πππ β
βββββββββββββββββ                                
π΅πΈπππππ΅πΈ: [$usern](instagram.com/$usern)\n 
π΅πΈπππΌπππ΅πΈ: [$mail]\n 
π΅πΈππππππππππ΅πΈοΈ: $follow\n 
π΅πΈππππππππππ΅πΈοΈ: $following\n 
π΅πΈππππππ΅πΈοΈ: $media\n
π΅πΈππππππ΅πΈοΈ: ".date("Y")."/".date("n")."/".date("d")." : " . date('g:i') . "\n" . "  
βββββββββββββββββ
π΅πΈβ¬β’πΏπππππβ’β¬β’β«β’..β’β«β’β¬β’πΎπππππΌπβ’β¬π΅πΈ
π΅πΈ [@N_W_9 ββββββ @A_5CT] π΅πΈ",      
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>' π½ππΌπ±π΄π πππ΄ππ β: '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'πΈπ½ πππ΄π β: '.$user,'callback_data'=>'fgdfg']],
                                            [['text'=>"Gmail: $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],[['text'=>"protonmail: $kr",'callback_data'=>'fffttttrr']],
                                            [['text'=>"Aol : $RIO",'callback_data'=>'fgjjjvf']],
                                            [['text'=>'π°ππ°πΈπ»π°π±π»π΄:'.$true,'callback_data'=>'gj']],
                                            [['text'=>'π½πΎπ π°ππ°πΈπ»π°π±π»π΄: '.$false,'callback_data'=>'dghkf'],['text'=>'π½πΎπ π±πππΈπ½π΄πποΈ: '.$NotBussines,'callback_data'=>'dgdge']]
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } else {
         $NotBussines +=1;
        echo "NotBussines - $user\n";
    }
    usleep(750000);
    $i++;
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>' π½ππΌπ±π΄π πππ΄ππ β: '.$i,'callback_data'=>'fgf']],
                    [['text'=>'πΈπ½ πππ΄π β: '.$user,'callback_data'=>'fgdfg']],
                    [['text'=>"Gmail: $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                    [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],[['text'=>"protonmail: $kr",'callback_data'=>'fffttttrr']],
                    [['text'=>"Aol : $RIO",'callback_data'=>'fgjjjvf']],
                    [['text'=>'π°ππ°πΈπ»π°π±π»π΄:'.$true,'callback_data'=>'gj']],
                    [['text'=>'π½πΎπ π°ππ°πΈπ»π°π±π»π΄: '.$false,'callback_data'=>'dghkf'],['text'=>'π½πΎπ π±πππΈπ½π΄ππ: '.$NotBussines,'callback_data'=>'dgdge']]
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"π²π·π΄π²πΊπ΄π³ π΄π½π³ π΅πΈ : ".explode(':',$screen)[0]]);

