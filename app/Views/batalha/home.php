<?= view('batalha/_header', ['title' => 'Home']) ?>
<section class="hero" style="background-image:url('<?= esc($institucional['banner'] ?? '/img/logo.png') ?>')">
  <h1>Batalha do Céu</h1>
  <p>Freestyle rap battle oficial de Santa Bárbara d’Oeste/SP.</p>
  <a class="btn" href="/eventos">Ver eventos</a>
</section>
<section class="card"><h2>Sobre o projeto</h2><p><?= esc($institucional['sobre'] ?? '') ?></p></section>
<section class="grid2">
  <div class="card"><h3>Próxima edição</h3>
    <?php if ($proximoEvento): ?>
      <p><strong><?= esc($proximoEvento['titulo']) ?></strong></p><p><?= esc($proximoEvento['data']) ?> às <?= esc($proximoEvento['horario']) ?></p><p><?= esc($proximoEvento['local']) ?></p>
    <?php else: ?><p>Sem eventos futuros cadastrados.</p><?php endif; ?>
  </div>
  <div class="card"><h3>Top ranking</h3><ol><?php foreach($ranking as $mc): ?><li><?= esc($mc['nome_artistico']) ?> - <?= esc($mc['pontuacao']) ?> pts</li><?php endforeach; ?></ol></div>
</section>
<section class="card"><h3>Redes</h3><p><a href="<?= esc($institucional['instagram'] ?? '#') ?>">Instagram</a> | <a href="<?= esc($institucional['youtube'] ?? '#') ?>">YouTube</a></p></section>
<?= view('batalha/_footer') ?>
