<?php
/**
   ╔══════════════════════════════════════════════════════════╗
   ║                  [ Coded by Soltanmsb ]                  ║
   ║                                                          ║
   ║               https://GitHub.com/Soltanmsb               ║
   ║                                                          ║
   ║ [+] Date Update : 11/06/2023                             ║
   ║ [+] Version : [1.0]                                      ║
   ║ [+] Size : 4.00 KB (4,096 bytes)                         ║
   ║                                                          ║
   ╚══════════════════════════════════════════════════════════╝
 */

error_reporting(0);
$token_list_file     = "input.txt"; # File Tokens
$out_token_file      = "good-token.txt";
$valid_tokens        = array();
$base_mn             = fopen($token_list_file, 'r');
function check_token($token){
   $getMe = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getme'),true);
   $ok = $getMe['ok'];
   if($ok == 1 ){
      return true;
   }else{
      return false;
   }
}
if($base_mn) {
   while (($liner = fgets($base_mn)) !== false) {
      $liner = trim($liner);
      if (check_token($liner)) {
         $valid_tokens[] = $liner;
      }
   }
   fclose($base_mn);
}
if (!empty($valid_tokens)) {
   $valid_tokens_str = implode(PHP_EOL, $valid_tokens);
   file_put_contents($out_token_file, $valid_tokens_str);
}
?>
