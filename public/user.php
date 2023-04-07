<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="crud">
        <h3>Lista de Usuários</h3>
        <?php
        require('../app/DataBase.php');
        $DataBase = new DataBase();
        $sql = "SELECT * FROM usuario WHERE id > :id";
        $binds = ['id' => 0];
        $result = $DataBase->select($sql, $binds);
        if($result->rowCount() > 0){
            $dados = $result->fetchAll();
            foreach ($dados as $item){
                echo "<div class='result'>";
                echo "Nome: {$item['nome']}<br>";
                echo "Email: {$item['email']}<br>";
                echo "Descrição: {$item['descricao']}<br>";
                echo "</div>";
            }
        }else{
            echo "Não temos usuários cadastrados!";
        }
        ?>
    </div>
</body>
</html>