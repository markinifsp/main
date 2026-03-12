<?= view('batalha/_header', ['title' => 'Edições']) ?>
<h1>Histórico de Edições</h1><?php foreach($edicoes as $e): ?><div class="card"><h3><?= esc($e['nome']) ?></h3><p><?= esc($e['data']) ?> · Campeão: <?= esc($e['campeao']) ?></p><p><strong>Participantes:</strong> <?= esc($e['participantes']) ?></p><p><?= esc($e['observacoes']) ?></p><img src="<?= esc($e['fotos']) ?>"></div><?php endforeach; ?>
<?= view('batalha/_footer') ?>
