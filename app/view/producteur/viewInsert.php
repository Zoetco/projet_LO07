
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='prodCreated'>        
        <label class='w-25' for="id">nom : </label><input type="text" name='nom' size='75' value='Stone'> <br/>                          
        <label class='w-25' for="id">prenom : </label><input type="text" name='prenom' size='75' value='Emma'> <br/> 
        <label class='w-25' for="id">region : </label><input type="text" name='region' size='75' value='Alsace'>        <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



