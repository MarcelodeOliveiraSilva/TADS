<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>exercicio_01_b</title>
  </head>
  <body>
    <?php
      //$nome = array('fulano', 'beltrano', 'ciclano', 'ze' , 'ana' );
      //$idade = array('27', '29', '15', '13' , '21' );
      //$profissao = array( 'professor', 'engenheiro' , 'estudante' , 'estudante' , 'professor' );
      $menores = "";
      $pessoas = array(
          0 =>array("nome"=>"fulano", "idade"=> 27, "profissao"=>"professor"),
          1 =>array("nome"=>"beltrano", "idade"=>29, "profissao"=>"engenheiro"),
          2 =>array("nome"=>"ciclano", "idade"=>15, "profissao"=>"estudante"),
          3 =>array("nome"=>"ze", "idade"=>13, "profissao"=>"estudante"),
          4 =>array("nome"=>"ana", "idade"=>21, "profissao"=>"professor"),
          5 =>array("nome"=>"pedro", "idade"=>17, "profissao"=>"estudante"));
      echo "<table border = '1'>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>Idade</th>";
      echo "<th>Profissao</th>";
      echo "</tr>";
      
      foreach ($pessoas as $p) {
        if ($p["idade"] >= 18) {
          echo "<tr>";
          echo "<td>".$p['nome']."</td>";
          echo "<td>".$p['idade']."</td>";
          echo "<td>".$p['profissao']."</td>";
          echo "</tr>";
        } else {
          $menores = $menores."<tr><td>".$p['nome']."</td><td>".$p['idade']."</td><td>".$p['profissao']."</td></tr>";
        }
      }
      
      echo "</table>\n";
      echo "<table border = '1'>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>Idade</th>";
      echo "<th>Profissao</th>";
      echo "</tr>";
      echo $menores;
      echo "</table>";

      echo "Qtdd de Maiores de Idade: ".count($p);
      echo "<br/>Qtdd de Menores de Idade: ".(count($pessoas)-count($p));
    ?>
  </body>
</html>
