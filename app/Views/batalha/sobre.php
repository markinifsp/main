<?= view('batalha/_header', ['title' => 'Sobre']) ?>
<div class="card">
  <h1>Sobre a Batalha do Céu</h1>
  <p><?= esc($institucional['sobre'] ?? '') ?></p>
  <p>O movimento fortalece talentos locais, promove acesso à cultura e cria pertencimento para juventudes periféricas por meio da arte da palavra.</p>
</div>
<?= view('batalha/_footer') ?>
