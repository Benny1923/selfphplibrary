<?php
/*
用法
verifycaptcha(使用者傳送的驗證訊息);
回傳
true 驗證成功
false 驗證失敗(過期或其他原因)
2 空字串
*/
$secret_key = ''; //Google Recaptcha 驗證金鑰

function verifycaptcha($captcha) {
  if (!empty($captcha)) {
    return 2;
  } else {
    $sendcaptcha = curl_init();
    curl_setopt($sendcaptcha, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($sendcaptcha, CURLOPT_POST, true);
    curl_setopt($sendcaptcha, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $secret_key, 'response' => $captcha)));
    curl_setopt($sendcaptcha, CURLOPT_RETURNTRANSFER, true);
    $receivecaptcha = curl_exec($sendcaptcha);
    curl_close($sendcaptcha);
    $verifyresponse = json_decode($receivecaptcha, true);
    if ($verifyresponse['success'] == true) {
      return true;
    } else {
      return false;
    }
  }
}
?>
