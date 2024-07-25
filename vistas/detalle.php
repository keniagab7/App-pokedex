<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle de <?= ucfirst($datos['name']) ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/estilos.css">
</head>

<body>
    <div class="container">
        <h1><?= ucfirst($datos['name']) ?></h1>

        <div class="pokemon-navigation">
            <a href="<?= BASE_URL ?>pokemon/detalle/<?= $datos['id'] - 1 ?>" class="nav-button left">&#8249;</a>
            <img src="<?= $datos['sprites']['front_default'] ?>" alt="<?= $datos['name'] ?>" class="pokemon-image">
            <a href="<?= BASE_URL ?>pokemon/detalle/<?= $datos['id'] + 1 ?>" class="nav-button right">&#8250;</a>
        </div>

        <h2 class="subtitulo">About</h2>
        <ul>
            <li><strong>Weight:</strong> <?= $datos['weight'] / 10 ?> kg</li>
            <li><strong>Height:</strong> <?= $datos['height'] / 10 ?> m</li>
            <li><strong>Moves:</strong>
                <ul>
                    <?php foreach ($datos['abilities'] as $ability) : ?>
                        <li><?= ucfirst($ability['ability']['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>

        <h2 class="subtitulo">Base stats</h2>
        <ul>
            <?php foreach ($datos['stats'] as $stat) : ?>
                <li>
                    <strong><?= ucfirst(str_replace('-', ' ', $stat['stat']['name'])) ?>:</strong> <?= $stat['base_stat'] ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <h2 class="subtitulo">Description</h2>
        <p><?= $datos['description'] ?></p>

        <a class="boton" href="<?= BASE_URL ?>">Back to list</a>
    </div>
</body>

</html>