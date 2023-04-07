<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Crud</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="crud">
        <h3>Dados mais que pessoais</h3>
        <form method="post" action="">
            <input name="nome" type="text" placeholder="Seu Nome">
            <input name="email" type="email" placeholder="Seu E-mail">
            <textarea name="descricao" placeholder="Descreva-se" cols="30" rows="10"></textarea>
            <button type="submit">Cadastrar</button>

        </form>
        <?php 
            require('../app/DataBase.php');
            $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            if(!empty($nome) && !empty($email) && !empty($descricao)){
                $DataBase = new DataBase();
                $sql = "INSERT INTO usuario SET nome = :nome, email = :email, descricao = :descricao";
                $binds = ['nome' => $nome, 'email' => $email, 'descricao' => $descricao];
                $result = $DataBase->insert($sql, $binds);
                if($result){
                    echo "<div class='success'>cadastro inserido com sucesso!</div>";
                }else{
                    echo "Ops, houve um erro! Tente novamente.";
                }             
            }
        ?>
    </div>
</body>
</html>
