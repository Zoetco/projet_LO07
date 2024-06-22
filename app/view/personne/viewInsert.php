
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='prodCreated'>        
        <label class='w-25' for="id">nom : </label><input type="text" name='nom' size='75' value='Stone'> <br/>                          
        <label class='w-25' for="id">prenom : </label><input type="text" name='prenom' size='75' value='Emma'> <br/> 
        <label class='w-25' for="id">statut : </label><input type="text" name='statut' size='75' value='1'>        <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewInsert -->



