<?
global $Page;

switch ($Page) {
     case 'categories':
          $nav_cat = 'active_nav';
          break;
     case 'section':
          $nav_cat = 'active_nav';
          break;

     case 'about_us':
          $nav_about_us = 'active_nav';
          break;

     case 'FormulAdd':
          $nav_cont = 'active_nav';
          break;

     default:
          $nav_main = 'active_nav';
          break;
}
?>
<!--         Header         -->
<header>
    <div class="row header">
        <div class="col-lg-9 col-md-9 height_inherit">
          <nav class="navbar navbar-default navbar-static-top">
              <div class="col-lg-3 col-md-3 navbar_middle <?=$nav_main?>">
                  <a href="/"><h3> Головна </h3></a>
              </div>
              <div class="col-lg-3 col-md-3 navbar_middle <?=$nav_cat?>">
                  <a href="categories"><h3> Категории </h3></a>
              </div>
              <div class="col-lg-3 col-md-3 navbar_middle <?=$nav_cont?>">
                  <a href="FormulAdd"><h3> Предложения </h3></a>
              </div>
              <div class="col-lg-3 col-md-3 navbar_middle <?=$nav_about_us?>">
                  <a href="about_us"><h3>  О нас </h3></a>
              </div>
          </nav>
        </div>
        <div class="col-lg-3 col-md-3 search-logIn">
             <div class=" col-lg-2 text-right"><img src="<?=get_url()?>page/images/icon-search.png" alt="icon-search" class="icon32 icon-search pointer"></div>
             <div class="col-md-7 text-left">
                  <a href="LogIn">
                       <h3 class="LogIn pointer">Вход</h3>
                  </a>
             </div>
             <div class="row">
                  <input type="text" placeholder="Поиск по сайту" class="search">
                  <input type="submit" value="Найти" style="display: none">
             </div>
        </div>
    </div>
</header>
<!--         End Header         -->
