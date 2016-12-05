<?
/**
 *  URL Class
 */
class URL
{
     var $url;
     var $Page;
     var $Moduls;
     var $Query;

     function __construct()
     {
          $this->url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
          $this->Query = $_SERVER['REQUEST_URI'];
          $this->getPage();
          // $this->show($_SERVER);
          // $this->show($this->getURL());
          // $this->getURL();
     }

     public function getPage()
     {
          if ($_SERVER['REQUEST_URI'] == '/') {
          	$this->Page = 'FrontPage';
          	$this->Moduls = 'ru';
          } else {
          	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
          	$URL_Parts = explode('/', trim($URL_Path, ' /'));
          	$this->Moduls = array_shift($URL_Parts);

               if ($this->testURL()) {
                    $this->Page = array_shift($URL_Parts);
               } else {
                    $this->Page = $this->Moduls;
                    $this->Moduls = 'ru';
               }
          }

          //$this->show($this->Page);

          return $this->Page;
     }

     public function getURL($aPage = '')
     {
          $this->getQuery();
          if ($aPage == '') {
               return $this->url.'/'.$this->Moduls.'/'.$this->Page.$this->Query;
          } else {
               return $this->url.'/'.$this->Moduls.'/'.$aPage.$this->Query;
          }

     }

     public function getModul($name)
     {

     }

     private function getQuery()
     {
          $str = explode("?", $this->Query);

          if ($str[1]) {
               $this->Query = '?'.$str[1];
               return true;
          } else {
               $this->Query = '';
               return false;
          }
     }

     public function addQuery($nameQuery = '', $valueQuery = '', $par = false)
     {
          if ($nameQuery == '' || $valueQuery == '') {
               return false;
          } else {
               if ($par) {
                    $this->Query = '';
               }
               if ($this->getQuery()) {
                    $this->Query = $this->Query.'&'.$nameQuery.'='.$valueQuery;
               } else {
                    $this->Query = $this->Query.'?'.$nameQuery.'='.$valueQuery;
               }
          }
     }

     public function testURL()
     {
          if ($this->Moduls == 'ru' || $this->Moduls == 'eu') {
               return true;
          } else {
               return false;
          }
     }

     public function show($arg)
     {
          echo '<pre>';
          print_r($arg);
          echo '</pre>';
     }
}

?>
