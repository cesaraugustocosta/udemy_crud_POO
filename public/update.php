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
        <h3>Atualização de Dados</h3>        
        <?php 
            require('../app/DataBase.php');
            $DataBase = new DataBase();
            $sql = "UPDATE usuario SET descricao = :descricao WHERE id = :id";
            $binds = ['descricao' =>'Sou Joana, mas pode me chamar de Jô', 'id' => 4];
            $result = $DataBase->update($sql, $binds);
            if($result){
                echo "<div class='success'>Atualizado com sucesso!</div>";
            }else{
                echo "<div class='erro' 
                style='background-color: #e91b1b;
                color: #fff;
                padding: 20px;'
            >Não foi possível fazer a atualização</div>";
            }

        ?>
            
    </div>
</body>
</html>

