<!doctype html>
<html lang="pt-br">
<head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <div class="container">
        <div class="col-sm-3" id="menu">
        <h1>Menu</h1>
        <button class="btn" onclick="mostrar(1)">Page 1</button>
        <?php echo "<br><br>" ?>
        <button class="btn" onclick="mostrar(2)">Page 2</button>
        <?php echo "<br><br>" ?>
        <button class="btn" onclick="mostrar(3)">Page 3</button>
        <?php echo "<br><br>" ?>
        </div>

        <div class="col-sm-6" id="txtHint">

        </div>
      </div>
    </body>
</html>
