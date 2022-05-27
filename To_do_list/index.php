<?php

    $connection = new PDO("mysql:host=localhost;dbname=To_do_list","root","");
    $allItems = $connection->query("SELECT * FROM tbItem;");


    if(isset($_POST["salvar"])){
        $insertion = $connection->prepare("INSERT INTO tbItem(itemName) VALUES(:itemName)");
        $insertion->bindParam(':itemName',$_POST['item'],PDO::PARAM_STR);
        $insertion->execute();
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>To do list</title>
    <script src="https://kit.fontawesome.com/acb58440dc.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <h1>To do list</h1>
            <input type="text" name="item" placeholder="O que queres fazer?">
            <input type="submit" value="Salvar tarefa" name="salvar">
        </form> 
        <div class="list">
        <?php
                while($row = $allItems->fetch(PDO::FETCH_ASSOC)):
            ?>
            <div class="item">
                <?php echo $row['itemName'];?>
                <div class="options">
                    <i class="fas fa-pen"></i>
                    <i class="fas fa-trash"></i>
                </div>
            </div>
            <?php endwhile?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>