<?php echo $this->extend('template') ?>
<?php echo $this->section('conteudo') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Informações do Post -->
        <header class="mb-5">
            <h1 class="display-4 fw-bolder text-dark mb-3"><?php echo $post->titulo ?></h1>
            <div class="text-secondary fs-6 mb-3">
                Por <span class="fw-bold text-primary"><?php echo $post->nome ?></span>
            </div>
            <span class="badge text-uppercase border-bottom border-primary pb-1" style="background-color:<?php echo $post->cor ?>;">
                <?php echo $post->descricao ?>
            </span>
        </header>

        <!-- Conteúdo do Post -->
        <article class="bg-white p-5 rounded-3 shadow-lg post-content">
            <?php echo $post->conteudo ?>
        </article>
        
        <a href="<?php echo base_url()?>" class="mt-4 btn btn-outline-primary btn-lg">
            &larr; Voltar para a listagem de vagas
        </a>
    </div>
</div>
<?php echo $this->endSection() ?>