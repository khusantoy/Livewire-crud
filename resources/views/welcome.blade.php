<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    @livewireStyles
</head>
<body>
<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];


$mobile = array('iphone', 'ipod', 'android', 'webos', 'mobile');
$is_mobile = false;
foreach ($mobile as $m) {
    if (stripos($user_agent, $m) !== false) {
        $is_mobile = true;
        break;
    }
}
if ($is_mobile) {
   $text = '<div style="display: flex; align-items: center; justify-content: center;">
                <p style="text-align: center">For best experience, please view this site on a desktop browser</p>
            </div>
            <button onclick="redirectToDesktop()">View Desktop Site</button>';
  echo $text;
  exit();
}
?>


<div class="container">
    <div class="row">
       @livewire('users-livewire')
    </div>
</div>
@livewireScripts
</body>
</html>
