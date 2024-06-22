
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
        <input type="hidden" name='action' value='banqueCreated'>        
        <label class='w-25' for="id">Label :  </label><input type="text" name='label' size='40' value=''> <br/>                          
        <label class='w-25' for="id">Pays: </label><input type="text" name='pays' value=''> <br/>         
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewInsert -->



