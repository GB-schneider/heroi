<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heróis PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <form action="index.php" method="post" class="p-5">
        <h3 id="titulo">Heróis PHP</h3>
        <div class="mb-3">
            <label for="universo" class="form-label">Digite seu universo (DC ou Marvel):</label>
            <input type="text" id="universo" name="universo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="heroi" class="form-label">Digite o seu herói:</label>
            <input type="text" id="heroi" name="heroi" class="form-control">
        </div>
        <div class="mb-3">
            <label for="quant" class="form-label">Digite a quantidade de vezes que você gostaria que o herói aparecesse:</label>
            <input type="text" id="quant" name="quant" class="form-control">
        </div>
        <div class="d-grid">
            <input type="submit" id="botao" class="btn btn-primary">
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["universo"]) || empty($_POST["heroi"]) || empty($_POST["quant"])) {
            echo "<h3>Por favor, preencha todos os campos</h3>";
        } else {
            $universo = strtolower($_POST["universo"]);
            $heroi = strtolower($_POST["heroi"]);
            $quant = (int)$_POST["quant"];

            $herois_dc = [
                "batman" => "imgs/batman.jpg",
                "superman" => "imgs/superman.jpg",
                "mulher maravilha" => "imgs/mulhermaravilha.jpg",
                "flash" => "imgs/flash.jpg",
                "aquaman" => "imgs/aquaman.jpg"
            ];

            $herois_marvel = [
                "homem aranha" => "imgs/homemaranha.jpg",
                "homem de ferro" => "imgs/homemdeferro.jpg",
                "capitao america" => "imgs/capitaoamerica.jpg",
                "thor" => "imgs/thor.jpg",
                "hulk" => "imgs/hulk.jpg"
            ];

            $herois = $universo == "dc" ? $herois_dc : ($universo == "marvel" ? $herois_marvel : null);

            if ($herois && array_key_exists($heroi, $herois)) {
                $imagem = $herois[$heroi];
                for ($x = 1; $x <= $quant; $x++) {
                    echo "<img src='$imagem' class='imagem'>";
                }
            } else {
                echo "<h3>Herói não encontrado ou inválido</h3>";
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>