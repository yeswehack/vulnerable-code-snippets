<!DOCTYPE html>
<html>
<body>

<!--
  YesWeHack - Vulnerable code snippets
-->
  
<center>
<form method="get">
  <label for="email">Subscribe to our newsletter</label><br>
  <input type="text" id="e" name="email" value=""><br>
  <span id="out"></span>
</form>
<input type="submit" id="btn" value="Subscribe" onclick="Newsletter()">
</center>

<script>
  //Handle email input:
  function Newsletter() {
    out = document.getElementById('out');

    //Filter email chars:
    email = '<?php echo htmlspecialchars($_GET['email']);?>';
    
    if ( email.split("@").length == 2  ) {
      <?php
        /** Verify email*/
        //Code...
      ?>

      dom = 'Welcome: <b>'+email+'</b>';
      out.innerHTML = dom;
    }
  }
</script>
</body>
</html>
