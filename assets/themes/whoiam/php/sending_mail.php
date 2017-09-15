<?php
session_start();
//configuration 
$path = 'uploads';
$filename = (isset($_POST['file']) && $_POST['file'] != '') ? $_POST['file'] : NULL;

$message = $_POST['message'];
$from = $_POST['email'];
$subject = $_POST['subject'];
$mailto = 'nhithai88@gmail.com';

// check if any attachment

if ($filename) {
  $file = $path . "/" . $filename;
  $file_size = filesize($file);
  $handle = fopen($file, "r");
  $content = fread($handle, $file_size);
  fclose($handle);
  $content = chunk_split(base64_encode($content));
}

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$headers = "From: $from\r\n"; 
$headers.= "MIME-Version: 1.0\r\n"; 
$headers.= "Content-Type: text/plain; charset=utf-8\r\n"; 
$headers.= "X-Priority: 1\r\n"; 
// attachment
if ($filename) {
  $headers .= "--" . $separator . $eol;
  $headers .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
  $headers .= "Content-Transfer-Encoding: base64" . $eol;
  $headers .= "Content-Disposition: attachment" . $eol . $eol;
  $headers .= $content . $eol . $eol;
  $headers .= "--" . $separator . "--";
}


$ress = array('error' => NULL, 'msg' => NULL);

// check captcha first;
if (isset($_SESSION['simpleCaptchaAnswer']) && $_POST['captchaSelection'] == $_SESSION['simpleCaptchaAnswer']) {
  //SEND Mail
  if (mail($mailto, $subject, $message, $headers)) {
    $ress['msg'] = "Thanks, I will get back to you ASAP";
  } else {
    $ress['error'] = "error : email not sent";
  }
} else {
  $ress['error'] = "Please check your answer!";
}
//respond to json
echo json_encode($ress);
