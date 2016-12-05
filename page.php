<?
     global $Page;

     if ($Page != 'admin') {
          mst_header($Page);

          mst_content($Page, mst_toolbarTest($Page));

          mst_footer($Page);
     } else {
          include('admin/adminPage.php');
     }

?>
