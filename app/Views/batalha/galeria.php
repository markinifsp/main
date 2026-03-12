<?= view('batalha/_header', ['title' => 'Galeria']) ?>
<h1>Galeria</h1><div class="grid3"><?php foreach($itens as $i): ?><a class="card" href="<?= esc($i['imagem']) ?>" target="_blank"><img src="<?= esc($i['imagem']) ?>"><p><?= esc($i['legenda']) ?></p></a><?php endforeach; ?></div>
<?= view('batalha/_footer') ?>
