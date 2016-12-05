<?
     global $mst_db;

     $formuls = $mst_db->getall('SELECT name, id FROM formul');
?>
<div id="toolbarRight">
     <div class="row">
          <h1 class="text-center">Формулы</h1>
     </div>
     <div class="row formuls toolbar">
          <ul>
               <?
               foreach ($formuls as $formul) {
                    echo '<li><a href="formulEdit?id='.$formul['id'].'">'.$formul['name'].'</a></li>';
               }
               ?>
          </ul>
     </div>
</div>
