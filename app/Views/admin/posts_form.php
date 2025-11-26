<?php $this->extend('admin/template')  ?>

<?php $this->section('conteudo') ?>

    <header class="mt-5 mb-5 pt-3">
        <h1 class="display-6 fw-bold text-dark">Criar Novo Post</h1>
        <p class="text-secondary mt-1">Preencha os campos abaixo para publicar uma nova vaga na Jobify.</p>
    </header>

    <!-- FORMULÁRIO DE NOVO POST -->
    <div class="card rounded-3 shadow">
        <div class="card-body p-4 p-md-5">
            <?php if(isset($msg) && $msg != '') : ?>
            <div class="alert alert-<?php echo $msg_icon ?>" role="alert">
                <?php echo $msg ?>
                <?php if(isset($erros)) : ?>
                <?php echo ': ' . implode('|', $erros) ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-4">
                    <label for="titulo" class="form-label fw-bold">Título do Vaga</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Escreva titulo de Sertanejo" class="form-control form-control-lg rounded-3" required>
                </div>
                <div class="mb-4">
                    <label for="resumo" class="form-label fw-bold">Resumo do Vaga</label>
                    <input type="text" id="resumo" name="resumo" placeholder="Ex: Escreva aqui um breve resumo da vaga" class="form-control form-control-lg rounded-3" required>
                </div>
                <div class="mb-4">
                    <label for="conteudo" class="form-label fw-bold">Conteúdo</label>
                    <textarea id="conteudo" name="conteudo" rows="15" placeholder="Comece a escrever seu artigo aqui..." class="form-control rounded-3" required></textarea>
                </div>
                <div class="mb-5">
                    <label for="categoria_id" class="form-label fw-bold">Categoria</label>
                    <?php echo $comboCategorias ?>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg px-5">
                        Publicar Vaga
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- FIM DO FORMULÁRIO -->

<?php $this->endSection() ?>