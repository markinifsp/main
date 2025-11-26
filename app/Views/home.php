<?php echo $this->extend('template')  ?>

<?php echo $this->section('conteudo') ?>
<h1 class="display-5 fw-bold text-dark mb-4 border-bottom border-primary pb-2">Últimas vagas</h1>
    <!-- GRID DE POSTS -->
    <div class="row g-4">
        <?php if(count($posts) > 0) : foreach($posts as $post) : ?>
        <!-- Post 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 rounded-3 shadow">
                <div class="card-body">
                    <span class="badge text-uppercase mb-2" style="background-color: <?php echo $post->cor ?>;"><?php echo $post->descricao ?></span>
                    <h5 class="card-title fw-bold fs-4">
                        <a href="<?php echo base_url('posts/' . $post->id) ?>" class="text-dark text-decoration-none"><?php echo $post->titulo ?></a>
                    </h5>
                    <p class="card-text text-muted">
                        <?php echo $post->resumo ?>
                    </p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <small class="text-muted">Por: <?php echo $post->nome ?></small>
                    <a href="<?php echo base_url('posts/' . $post->id) ?>" class="btn btn-sm btn-outline-primary">Ler Mais &rarr;</a>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
<?php echo $this->endSection() ?>