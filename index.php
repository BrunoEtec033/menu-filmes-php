<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <style>
        body {
            background-color: #e0e0e0;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .cabeca {
            background-color: aliceblue;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        select, button {
            padding: 10px;
            font-size: 16px;
            margin: 5px;
            border-radius: 5px;
            border: none;
        }

        .atores {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .ator {
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            width: 200px;
            text-align: center;
        }

        .ator img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .ator strong {
            display: block;
            margin-top: 10px;
            color: #444;
        }
    </style>
</head>
<body>

    <h1>Filmes e Atores</h1>

    <?php
        require_once 'func.php';
        require_once 'dados.php';
    ?>

    <div class="cabeca">
        <form method="get" id="formEscolha">
            <select name="filme" id="filme">
                <option value="">Selecione um Filme</option>
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

    <div class="atores">
        <?php
            if(isset($_GET['filme']) && $_GET['filme'] !== ''){
                $filme = $_GET['filme'];
                getAtoresPorFilme($filme, $filmes, function($atores){
                    foreach ($atores as $ator) {
                        echo "<div class='ator'>";
                        echo "<img src='images/{$ator['foto']}' alt='{$ator['nome']}'>";
                        echo "<strong>{$ator['nome']}</strong>";
                        echo "</div>";
                    }
                });
            }
        ?>
    </div>

</body>
</html>
