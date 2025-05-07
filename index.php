<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes e Atores</title>
</head>

<style>

    *{
            list-style: none;
            background-color: silver;
    }
    

    .cabeca{
        margin-bottom: 10px;
        background-color: red;
        
    }
    div{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    img{
        width: 300px;
        height: 250px;
    }
 
</style>
<body>

    <h1>Filmes e Atores</h1>

    <?php
        require_once 'func.php';
        require_once 'dados.php';
    ?>

   <div class="cabeca">
    <form method="get" id="formEscolha">
        <select name="filme" id="filme">
            <option value="">Selecione um Filme...</option>
            <?php
                getFilmes($filmes, function($filmes){
                    foreach ($filmes as $filme) {
                        echo "<option value='{$filme}'>{$filme}</option>";
                    }
                });
            ?>
        </select>
        <button type="submit">Mostrar Atores</button>
    </form>

    </div>

    


  
    <div>
        <?php
            if(isset($_GET['filme'])){
                $filme = $_GET['filme'];
                getAtoresPorFilme($filme, $filmes, function($atores){
                    foreach ($atores as $ator) {
                        echo " <img src='images/{$ator['foto']}'";
                        echo "<li><strong>{$ator['nome']}</strong> ";
                    }
                });
            }
        ?>
   
    </div>

</body>
</html>
