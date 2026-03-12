<?= view('batalha/_header', ['title' => 'Ranking']) ?>
<h1>Ranking Geral</h1><table class="table"><tr><th>Posição</th><th>MC</th><th>Pontuação</th><th>Títulos</th></tr><?php foreach($ranking as $mc): ?><tr><td>#<?= esc($mc['posicao']) ?></td><td><?= esc($mc['nome_artistico']) ?></td><td><?= esc($mc['pontuacao']) ?></td><td><?= esc($mc['titulos']) ?></td></tr><?php endforeach; ?></table>
<?= view('batalha/_footer') ?>
