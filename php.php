<?php 

  include("conecta.php");  
  
  $nome = $_POST['nome'];
  $email = $_POST['email'];    
  $telefone = $_POST['telefone'];

  $comando = $pdo->prepare("INSERT INTO contatos(nome,email,telefone) VALUES('$nome','$email','$telefone')");     
  if($comando->execute()){  
         
    header("Location: banco.html"); 
  }



  echo "<h1>Agenda Telefônica</h1>";

foreach ($contatos as $contato) {
    echo "<p><strong>Nome:</strong> " . $contato['nome'] . "</p>";
    echo "<p><strong>E-mail:</strong> " . $contato['email'] . "</p>";
    echo "<p><strong>Telefone:</strong> " . $contato['telefone'] . "</p>";
    echo "<hr>";
}

$comando = $pdo->prepare("SELECT * FROM alunos");
$resultado = $comando->execute();
while( $linhas = $comando->fetch() )
        {
            $dados_imagem = $linhas["foto"];
            $i = base64_encode($dados_imagem);

            $login =  $linhas["login"];
            $senha =  $linhas["senha"];

            echo("LOGIN: $login SENHA: $senha  <br>");
            echo(" <img src='data:image/jpeg;base64,$i' width='100px'> <br> <br> ");
        }

?>
?>