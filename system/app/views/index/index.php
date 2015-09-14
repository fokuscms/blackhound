<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Blackhound!</title>

    <link href="<?php echo resource('/css/style.css');  ?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div class="content">
        <img src="<?php echo resource('/images/blackhound-logo.jpg');  ?>"
             alt="Blackhound Framework" title="Blackhound Framework">
        <h1><?php echo lang('hello'); ?></h1>
        <h2><?php echo lang('install').', '.$name; ?>!</h2>
    </div>


</body>
</html>