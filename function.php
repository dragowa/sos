<?

function get_url() {
     global $url;
     return $url->url.'/';
}

/*
*     function add head
*/
function mst_head($title = '') {
     include('page/head.php');
}

/*
*     function add header
*/

function mst_header($title) {
     ?>
          <!DOCTYPE html>
          <html lang="en">
               <?mst_head($title);?>
          <body>
          <div class="container">
          <? if (file_exists('page/header/'.$title.'-header.php')) {
                  include('page/header/'.$title.'-header.php');
             } else {
                  include('page/header/main-header.php');
             }
          ?>
     <?
}

/*
*     function add footer
*/

function mst_footer($script = null) {
     include('page/footer.php');
?>
     </div>
     <?mst_add_script($script);?>
     </body>
</html>
<?
}

/*
*     function add content
*/

function mst_content($Page, $toolbar = false) {
     if ($Page == '') {
          $Page = 'main';
     }
     echo
     '
     <div class="row content">
     ';
      if ($toolbar) {
          echo '<div class="col-lg-9 col-md-9">';
     }
     if (file_exists('page/'.$Page.'.php')) {
          include('page/'.$Page.'.php');
     } else {
          include('404.html');
     }
     if ($toolbar) {
          mst_toolbar();
     }
      echo
      '
     </div>
           <div class="btn_up">
              <div class="btn_up_inside"></div>
           </div>
     </div>
      ';
}


/*
*     function test toolbar
*/

function mst_toolbarTest($Page) {
     switch ($Page) {
          case 'formula':return true; break;

          default: return false; break;
     }
}

/*
*     function add toolbar
*/

function mst_toolbar() {
     echo
     '
     <!--         Right Panel         -->
     <div class="col-lg-3 col-md-3 right">
     ';
     get_categories( 'math');
     get_categories( 'phys');
     get_categories( 'chem');
     echo
     '
     </div>
     <!--        End Right Panel         -->
     ';
}

/*
*     function add common scripts
*/

function mst_add_script($script) {
     include('page/script.php');
}

/*
*     function get categories
*/

function get_categories($cat = null) {
     if ($cat != null) {

          global $mst_db, $url;

          switch ($cat) {
               case 'math': $cat_num = 1; break;
               case 'phys': $cat_num = 2; break;
               case 'chem': $cat_num = 3; break;
          }
          $cat_name = $mst_db->getRow('SELECT name_categories FROM categories WHERE cat_id = '.$cat_num);
          $cat_section = $mst_db->getAll('SELECT name_section, sec_id  FROM section WHERE cat_id = '.$cat_num);
          ?>
          <div class="row cat cat-<?=$cat?>">
               <div class="row">
                    <div class="col-lg-12 col-md-12 title">
                       <h2><?=$cat_name['name_categories']?></h2>
                    </div>
               </div>
               <? foreach ($cat_section as $section) { ?>
               <div class="row">
                  <div class="col-lg-12 col-md-12 mar-top-20">
                       <?
                       //var_dump($_GET);
                         // if (!$_GET['sec_id']) {
                         //      $url->addQuery('sec_id', $section['sec_id']);
                         // } else {
                         //      $url->addQuery('sec_id', $section['sec_id'], true);
                         // }

                         $url->addQuery('sec_id', $section['sec_id']);
                       ?>
                       <a href="<?=$url->getURL('section');?>"><h3 class="pointer"><?=$section['name_section']?></h3></a>
                  </div>
               </div>
               <? } ?>
          </div>
          <?
     } else {
          return false;
     }
}

/*
*     end get categories
*/

function transforFormul($formula) {
     global $mst_db;

     $real_formula = $formula;

     preg_match_all('/%([0-9])%/', $real_formula, $formula_arr);

     for ($i = 0; $i < count($formula_arr[0]); $i++) {
          $symbol =  $mst_db->getone('SELECT symbol FROM symbol WHERE id = '.$formula_arr[1][$i]);
          $real_formula = str_replace($formula_arr[0][$i], $symbol, $real_formula);
     }

     return $real_formula;
}

/*
*     function get Name Formula
*/

function getName($id, $formula) {
     echo $formula['name'];
}

/*
*     function get Formula
*/

// function getFormula($id) {
//      global $mst_db;
//
//      $formula = $mst_db->getOne('SELECT formula  FROM formul WHERE id = ?i',$id);
//      //$mainValue = $mst_db->getone('SELECT symbol FROM symbol WHERE id= '.$formula['main_value']);
//
//      echo '<input type="hidden" id="formula" value="'.$formula.'">';
// }

function getFormula($id, $i, $formula) {
     global $mst_db;

     $mainValue = $mst_db->getone('SELECT symbol FROM symbol WHERE id = '.$formula['main_value']);

     echo '<input type="hidden" id="formula_'.$i.'" class="formula" value="'.$mainValue.'='.transforFormul($formula['formula']).'">';
}

/*
*     function Description Variable
*/

function getDesVer($id, $formula) {
     global $mst_db;

     $real_formula = $formula['formula'];

     preg_match_all('/%([0-9])%/', $real_formula, $formula_arr);

     // Main symbol

     $symbol =  $mst_db->getrow('SELECT * FROM symbol WHERE id = '.$formula['main_value']);
     echo '
     <div class="row">
          <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 left_1">
              <h2><a href="'.$submob['a'].'">'.$symbol['symbol'].'</a> - '.$symbol['short_description'].' </h2>
          </div>
      </div>';

     // Other symbol

     for ($i = 0; $i < count($formula_arr[0]); $i++) {
          $symbol =  $mst_db->getrow('SELECT * FROM symbol WHERE id = '.$formula_arr[1][$i]);
          echo '
          <div class="row">
               <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 left_1">
                   <h2><a href="'.$submob['a'].'">'.$symbol['symbol'].'</a> - '.$symbol['short_description'].' </h2>
               </div>
           </div>';
     }
}

/*
*     function Building Block Formula
*/

function buildFormula($id)
{
     global $mst_db;
     $formula = $mst_db->getrow('SELECT *  FROM formul WHERE id = ?i', $id);

     if ($id == '' || $formula == NULL || $formula == false) {
          echo '<div class="error">Формула не найдена!</div>';
     } else {
     ?>
      <div class="row titleFromula">
          <h2><?getName($id, $formula)?></h2>
      </div>
      <div class="row formula-row">
         <? getFormula($id, 0, $formula); ?>
         <div class="container_formula_0 container_formula"></div>
         </div>
      <div class="row desVar">
         <? getDesVer($id, $formula); ?>
      </div>
     <?
     }
}
/*
*     end Page Formula
*/


/*
*     Pege Section
*/

function get_section($cat_id) {
     global $mst_db, $url;

     $section =  $mst_db->getall('SELECT * FROM section WHERE cat_id = ?i', $cat_id);

     $i = 1;
     foreach ($section as $row) {
          $url->addQuery('sec_id', $row['sec_id']);
          //$url->show($url->Query);
          echo '<li><a href="'.$url->getURL('section').'">'.$i.'. '.$row['name_section'].'</a></li>';
          $i++;
     }
}

function get_formula_section($id) {
     global $url;
     if ($id == '') {
          echo '<div class="error">Формулы не найдины!</div>';
     } else {
          global $mst_db;
          if ($formul =  $mst_db->getall('SELECT * FROM formul WHERE sec_id = ?i', $id)) {
               $i = 0;
               foreach ($formul as $row) {
               $mainValue = $mst_db->getone('SELECT symbol FROM symbol WHERE id = '.$row['main_value']);
               ?>
               <tr>
                    <td>
                         <?
                              getFormula($row['id'], $i, $row);
                         ?>
                         <div class="container_formula_<?=$i?> container_formula"></div>
                         </div>
                    </td>
                    <td>
                         <a href="<?$url->addQuery('id', $row['id']); echo $url->getURL('formula');?>"><?=$row['name']?></a>
                    </td>
               </tr>

               <?
               $i++;
               }
          } else {
               echo '<div class="error">Формулы не найдины!</div>';
          }
          //$section =  $mst_db->getrow('SELECT * FROM symbol WHERE id = ?i', $id);
     }
}




?>
