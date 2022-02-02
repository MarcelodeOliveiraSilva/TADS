<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>exercicio_01_a</title>
  </head>
  <body>
    <?php
      $pessoas = array(
          0 =>array("nome"=>"fulano", "idade"=> 27, "profissao"=>"professor"),
          1 =>array("nome"=>"beltrano", "idade"=>29, "profissao"=>"engenheiro"),
          2 =>array("nome"=>"ciclano", "idade"=>15, "profissao"=>"estudante"),
          3 =>array("nome"=>"ze", "idade"=>13, "profissao"=>"estudante"),
          4 =>array("nome"=>"ana", "idade"=>21, "profissao"=>"professor"),
          5 =>array("nome"=>"pedro", "idade"=>30, "profissao"=>"medico"));
      echo "<table border = '1'>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>Idade</th>";
      echo "<th>Profissao</th>";
      echo "</tr>";
      
      foreach ($pessoas as $p) {
          echo "<tr>";
          echo "<td>".$p['nome']."</td>";
          echo "<td>".$p['idade']."</td>";
          echo "<td>".$p['profissao']."</td>";
          echo "</tr>";
      }
    ?>
  </body>
</html>
