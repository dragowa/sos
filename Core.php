<?
     /**
      *  Core Class
      */
     class Core extends URL
     {
          var $page;
          var $modul;
          var $url;

          function __construct() {

          }

          public function mst_head($title = 'SoS') {
               //include_once(/user/);
               global $url;
               ?>
                    <head>
                         <meta charset="UTF-8">
                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">

                         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
                         <link rel="stylesheet" href="page/style.css">
                         <link rel="stylesheet" href="page/CSS/<?=$title?>.css">

                         <title><?=$title?></title>
                    </head>
               <?
          }

     }

     /**
      *  URL Class
      */
     class URL
     {

          var $url;
          var $url_the_directory;

          public function Redirect($url, $permanent = false)
          {
              header('Location: ' . $url, true, $permanent ? 301 : 302);

              exit();
          }

          public function get_redirect_url($lang = 'ru', $categories = null, $section = null, $page = '/')
          {
               $Modul = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ' /'));

               if ($Modul[0] == 'ru' || $Modul[0] == 'en') {
                    $this->url = $this->get_urlDomain().'/'.$Modul[0];
               } else {
                    $this->url = $this->get_urlDomain().'/ru/';
               }

               if ($Modul[1] == 'math' || $Modul[1] == 'math' || $Modul[1] == 'math') {

               }

               return $this->url;
          }

          public function get_urlDomain()
          {
               return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
          }

          public function get_urlPage()
          {
               return $_SERVER['REQUEST_URI'];
          }

          public function get_urlModul($num_modul = 0)
          {
//               $Modul = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



               switch ($num_modul) {
                    case '1': break;

                    default:
                         # code...
                         break;
               }
          }

          protected function get_urlDirectory()
          {
               # code...
          }

          protected function get_lastPage() {
               return $_SERVER['HTTP_REFERER'];
          }

     }


?>
