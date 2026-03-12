<?= view('batalha/_header', ['title' => $mc['nome_artistico']]) ?>
<div class="card"><img class="avatar" src="<?= esc($mc['foto']) ?>"><h1><?= esc($mc['nome_artistico']) ?></h1><p><?= esc($mc['bio']) ?></p><ul><li>Cidade/Bairro: <?= esc($mc['cidade']) ?></li><li>Posição: #<?= esc($mc['posicao']) ?></li><li>Pontuação: <?= esc($mc['pontuacao']) ?></li><li>Participações: <?= esc($mc['participacoes']) ?></li><li>Vitórias: <?= esc($mc['vitorias']) ?></li><li>Títulos: <?= esc($mc['titulos']) ?></li></ul></div>
<?= view('batalha/_footer') ?>
