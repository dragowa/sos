<?
     global $url;
     if (isset($_POST['login']) && $_POST['login'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
          global $mast_db;

          $admin = $mst_db->getRow("SELECT * FROM admin WHERE id = 1");
          $key_admin = $admin['key'];
          $login = $_POST['login'];
          $password = $_POST['password'];
          $key_user = GenPass($login, $password);

          if ($key_admin == $key_user) {
               echo 'success';
          } else {
               die('Error: Access Denied!');
          }
     } else {
          die('Error: Empty form!');
     }
?>
