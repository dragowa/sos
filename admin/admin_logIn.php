<?
     global $url;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
 /**
  * Функция для отправки формы средствами Ajax
  * @author Дизайн студия ox2.ru
  **/
 function AjaxFormRequest(result_id, form_id, url) {
     jQuery.ajax({
         url: url, //Адрес подгружаемой страницы
         type: "POST", //Тип запроса
         dataType: "html", //Тип данных
         data: jQuery("#" + form_id).serialize(),
         success: function(data) { //Если все нормально
             if (data == 'success') {
                    window.location.href = "<?=$url?>admin_main";
             } else {
                    console.log(data);
                    return false;
             }
         },
         error: function(data) { //Если ошибка
             console.log('error');
             return false;
         }
     });
     return false;
 }

</script>

<div class="content">
     <div class="logIn row">
          <div class="col-md-6 offset-md-3">
               <form action="" method="post" id="logInAdmin" onsubmit="AjaxFormRequest('result_div_id', 'logInAdmin', '<?=$url?>form/form.php')">
                    <input type="text" name="login" class="" id="login">
                    <input type="password" name="password" class="" id="password">
                    <input type="submit" value="Увійти">
               </form>
          </div>
     </div>
</div>
