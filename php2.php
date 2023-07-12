<?php
include("conecta.php");  
  
$nome = $_POST['nome'];
$email = $_POST['email'];    
$telefone = $_POST['telefone'];

if (isset($_POST['inserir'])){
    $comando = $pdo->prepare("INSERT INTO contatos(nome,email,telefone) VALUES('$nome','$email','$telefone')");     
    $comando->execute();
    header("Location: banco.html"); 

}

if (isset($_POST['excluir'])){
    $sql = $pdo->prepare("DELETE FROM contatos WHERE(nome = '$nome')");    
    $sql->execute();
    header("Location: banco.html"); 
}

if (isset($_POST['listar'])){
    
    $statement = $pdo->query("SELECT * FROM contatos");
    $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);

    $output = '';
    foreach ($contacts as $contact) {
        $nome = $contact['nome'];
        $email = $contact['email'];
        $telefone = $contact['telefone'];

        $output .= '<li class="contact">';
        $output .= '<div class="name">' . $nome . '</div>';
        $output .= '<div class="email">' . $email . '</div>';
        $output .= '<div class="phone">' . $telefone . '</div>';
        $output .= '</li>';
    }

    echo $output;
}

if(isset($_POST["alterar"]))
{
     $comando = $pdo->prepare("UPDATE contatos SET Nome='$nome', Email='$email', Telefone='$telefone' WHERE nome='$nome'");
      $resultado = $comando->execute();
      header("Location: banco.html");
}
?>
