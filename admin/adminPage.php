<?
include('admin/header.php');
?>
<div class="col-md-3">
<?
include('admin/toolbarLeft.php');
?>
</div>
<div class="col-md-6">
<?
if ($Module == '') {
     $Module = 'main';
}
switch ($Module) {
     case 'addFormula':
          include('admin/admin_main.php');
          break;
     case 'addSymbol':
          include('admin/addSymbol.php');
          break;

     case 'formulEdit':
          include('admin/formulaEdit.php');
          break;

     case 'symbolEdit':
          include('admin/symbolEdit.php');
          break;

     case 'main':
          include('admin/admin_main.php');
          break;

     // case 'addFormula':
     //      include('admin/admin_main.php');
     //      break;
     //
     // case 'addFormula':
     //      include('admin/admin_main.php');
     //      break;


     default:
          include('404.html');
          break;
}
?>
</div>
<div class="col-md-3">
<?
include('admin/toolbarRight.php');
?>
</div>
