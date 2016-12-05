<?
     global $mst_db;

     $formuls = $mst_db->getall('SELECT name, id FROM formul');
?>
<div id="toolbarLeft">
     <div class="row">
          <h1 class="text-center">Меню</h1>
     </div>
     <div class="row menu toolbar">
          <ul>
               <li><a href="addFormula">Добавить формулу</a></li>
               <li><a href="addSymbol">Добавить символ</a></li>
               <li><a href="formulEdit">Редактировать формулу</a></li>
               <li><a href="symbolEdit">Редактировать символ</a></li>
          </ul>
     </div>
</div>
