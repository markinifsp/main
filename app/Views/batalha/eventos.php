<?= view('batalha/_header', ['title' => 'Eventos']) ?>
<h1>Eventos</h1>
<section class="card"><h2>Próximos</h2><?php foreach($futuros as $e): ?><article class="item"><img src="<?= esc($e['imagem']) ?>"><div><h3><?= esc($e['titulo']) ?></h3><p><?= esc($e['data']) ?> <?= esc($e['horario']) ?> - <?= esc($e['local']) ?></p><p><?= esc($e['descricao']) ?></p></div></article><?php endforeach; ?></section>
<section class="card"><h2>Passados</h2><?php foreach($passados as $e): ?><article class="item"><img src="<?= esc($e['imagem']) ?>"><div><h3><?= esc($e['titulo']) ?></h3><p><?= esc($e['data']) ?> <?= esc($e['horario']) ?> - <?= esc($e['local']) ?></p><p><?= esc($e['descricao']) ?></p></div></article><?php endforeach; ?></section>
<?= view('batalha/_footer') ?>
