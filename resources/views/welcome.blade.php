<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
            </div>';
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
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
</body>
</html>
