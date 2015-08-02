<?php
function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}

if(isset($_POST['g-recaptcha-response'])) {
  require_once './recaptcha/autoload.php';
  $recaptcha = new \ReCaptcha\ReCaptcha('6Lcj4wkTAAAAAM1DLFAzfyBxE7vT_8PVPnZ-88dQ');
  
  $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
  
  if ($resp->isSuccess()) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if ((!IsNullOrEmptyString($name)) and (!IsNullOrEmptyString($email)) and (!IsNullOrEmptyString($message))) {
        mail("ismael.kix2902@gmail.com","Web contact [polymer]","Name: ".$_POST['name']."\r\nE-mail: ".$_POST['email']."\r\nMessage: ".$_POST['message']);
        
        echo "0";
        
    }else{
        echo "1";
    }
    
  }else{
    echo "2";
  }
}
?>