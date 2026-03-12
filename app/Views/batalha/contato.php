<?= view('batalha/_header', ['title' => 'Contato']) ?>
<div class="card"><h1>Contato e localização</h1><p><strong>Endereço:</strong> <?= esc($institucional['endereco'] ?? '') ?></p><iframe src="https://maps.google.com/maps?q=Santa%20Barbara%20d%27Oeste%20SP&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe><p><a href="<?= esc($institucional['instagram'] ?? '#') ?>">Instagram</a> · <a href="<?= esc($institucional['youtube'] ?? '#') ?>">YouTube</a></p></div>
<?= view('batalha/_footer') ?>
