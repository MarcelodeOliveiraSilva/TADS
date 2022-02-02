<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script> function mostrar(str) {
      if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
      } else {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "Pages.php?q="+str,true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
          }
        };
      }
    }
    </script>
    <style>
    .btn {
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
      border: solid 1px #20538D;
      text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
      -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
      background: #4CAF50;
      color: 	#F8F8FF;
      padding: 8px 12px;
      text-decoration: none;
    }
    </style>
  </head>
    <body>
    	<div id="header">
     	<?php include("header.php"); ?>
    	</div>

      <div class="container">
        <?php include("main.php"); ?>
      </div>



      <div id="footer">
     	<?php include("footer.php"); ?>
    	</div>

    </body>
</html>