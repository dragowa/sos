<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
     <link rel="stylesheet/less" type="text/css" href="page/CSS/styles.less" />
     <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.min.js"></script>
     <link rel="stylesheet" href="<?=get_url();?>page/style.css">
     <? if (file_exists('page/CSS/'.$title.'.css')) { ?>
          <link rel="stylesheet" href="<?=get_url();?>page/CSS/<?=$title?>.css">
     <? } ?>
     <? if (file_exists('page/header/css/'.$title.'.css')) { ?>
          <link rel="stylesheet" href="<?=get_url();?>page/header/css/<?=$title?>.css">
     <? } else { ?>
     <link rel="stylesheet" href="<?=get_url();?>page/header/css/main.css">
     <? } ?>
     <title><?=$title?></title>
</head>
