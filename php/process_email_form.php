<?php
  // The global $_POST variable allows you to access the data sent with the POST method by name
  // To access the data sent with the GET method, you can use $_GET
//   echo $_POST;
    // $hcaptcha = htmlspecialchars($_POST['h-captcha-response']);
//   $say = htmlspecialchars($_POST['']);
    $url = "https://hcaptcha.com/siteverify";
    $data = array(
        'secret' => "0x3A33F67e436B230F660d63Fdb7973e1B8dFce1DC",
        'response' => $_POST['h-captcha-response']
                );

    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($verify);
    var_dump($response);
    $responseData = json_decode($response);

    // sleep(10);
    
    if($responseData->success == 'true') {
        header("Location: https://towb.es/?email=ari@towb.es");
    } 
    else {
        header("Location: https://towb.es/");
    }
    
    die();
?>
