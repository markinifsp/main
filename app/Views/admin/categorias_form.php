<?php $this->extend('admin/template')  ?>

<?php $this->section('conteudo') ?>

    <header class="mt-5 mb-5 pt-3">
        <h1 class="display-6 fw-bold text-dark">Criar Nova Categoria</h1>
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
                    <label for="descricao" class="form-label fw-bold">Descrição da Categoria</label>
                    <input type="text" id="descricao" name="descricao" placeholder="Ex: Tecnologia" class="form-control form-control-lg rounded-3">
                </div>
                <div class="mb-4">
                    <label for="cor" class="form-label fw-bold">Cor</label>
                    <input type="color" id="cor" name="cor" class="form-control form-control-lg rounded-3">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg px-5">
                        Cadastrar Categoria
                    </button>
                </div>
                
            </form>
        </div>
    </div>
    <!-- FIM DO FORMULÁRIO -->

<?php $this->endSection() ?>