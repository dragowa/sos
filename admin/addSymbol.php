<?
if ($_GET['postForm']) {
     if (isset($_POST['name']) && $_POST['name'] != '') {
          global $mst_db;
          if ($_POST['name'] == '') $_POST['name'] = '404';

          if ($mst_db->getOne("SELECT name FROM formul WHERE name = ?s", $_POST['name']) != '') die('1');
          // global $mst_db;
          //
          // $mst_db->query("INSERT INTO formul SET ?u", array('formula' => 12, ));
          $formula = explode("=", $_POST['formula']);
          $mainValue = $mst_db->getone('SELECT id FROM symbol WHERE symbol = ?s', $formula[0]);
          $formula = $formula[1];

          $i = 0;
          $len=strlen($formula);
          do {
               if (!($formula{$i} == '*' || $formula{$i} == '/' || $formula{$i} == '+' || $formula{$i} == ')' || $formula{$i} == '(' || $formula{$i} == '-')) {
                    $symbol = $mst_db->getone('SELECT id FROM symbol WHERE symbol = ?s', $formula{$i});
                    $str .= '%'.$symbol.'%';
               } else {
                    $str .= $formula{$i};
               }

               $i++;
          } while($i < $len);

          $mst_db->query("INSERT INTO formul SET ?u", array(
               'name' => $_POST['name'],
               'formula' => $str,
               'main_value' => $mainValue,
               'des' => $_POST['description'],
               'cat_id' => $_POST['catigories'],
               'sec_id' => $_POST['section'],
                ));
           die('2');
     }
}

?>

<body>
    <form action="adminToolbar?postForm=true" method="post" name='add_Formula'>
        <div class="container forma">
            <div class="row">
                <label for="name" class='col-md-3'>Название символа</label>
                <input type="text" class="col-md-9" name="name" id="name" placeholder="Введите имя ...">
            </div>
            <div class="row">
               <label for="formula" class='col-md-3'>Символ</label>
               <input type="text" class="col-md-9" name="formula" id="formula" placeholder="Например: F=m*a">
            </div>
            <div class="row">
               <label for="description" class="col-md-3">Описание</label>
               <input type="text" name="description" class="col-md-9" id="description" placeholder="Введите описание ..."></input>
            </div>
            <div class="row">
                <label for="catigories" class="col-md-3">Категория</label>
                <select name="catigories" class="col-md-9" id="catigories">
                         <option value="1">Математика</option>
                         <option value="2">Физика</option>
                         <option value="3">Химия</option>
                     </select>
            </div>
            <div class="row">
                 <label for="catigories" class='col-md-3'>Подкатегория</label>
                <select name="section" class='col-md-9' id="section">
                         <option value="1">knoweladge</option>
                     </select>
            </div>
            <div class="row">
                 <div class="result"></div>
            </div>
            <div class="row">
                <input type="submit" name="add" class="add col-md-offset-4 col-md-4" value="Добавить">
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/admin/js/admin.js"></script>
</body>

</html>
