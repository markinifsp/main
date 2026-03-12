<?= view('batalha/_header', ['title' => 'MCs']) ?>
<h1>MCs Participantes</h1><div class="grid3"><?php foreach($mcs as $mc): ?><div class="card"><img class="avatar" src="<?= esc($mc['foto']) ?>"><h3><?= esc($mc['nome_artistico']) ?></h3><p><?= esc($mc['cidade']) ?></p><p>#<?= esc($mc['posicao']) ?> · <?= esc($mc['pontuacao']) ?> pts</p><a href="/mcs/<?= esc($mc['slug']) ?>">Ver perfil</a></div><?php endforeach; ?></div>
<?= view('batalha/_footer') ?>
