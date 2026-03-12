<?= view('admin_batalha/_header') ?>
<h1>Dashboard</h1><div class="grid4"><div class="card"><h3>Total de MCs</h3><p><?= esc($totalMcs) ?></p></div><div class="card"><h3>Próximos eventos</h3><p><?= esc($proximosEventos) ?></p></div><div class="card"><h3>Últimas edições</h3><p><?= count($ultimasEdicoes) ?></p></div><div class="card"><h3>Fotos na galeria</h3><p><?= esc($fotos) ?></p></div></div>
<?= view('admin_batalha/_footer') ?>
