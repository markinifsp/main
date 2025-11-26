<?php $this->extend('admin/template')  ?>

<?php $this->section('conteudo') ?>

    <header class="d-flex justify-content-between align-items-center mt-5 mb-5 pt-3">
        <h1 class="display-6 fw-bold text-dark">Gerenciamento de Vagas</h1>
        <a href="<?php echo base_url('admin/posts/adicionar') ?>" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus me-1"></i> Novo Post
        </a>
    </header>

    <!-- TABELA DE POSTS -->
    <div class="card rounded-3 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3">Título</th>
                            <th scope="col" class="py-3 d-none d-md-table-cell">Categoria</th>
                            <th scope="col" class="py-3 d-none d-sm-table-cell">Autor</th>
                            <th scope="col" class="py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post) : ?>
                        <tr>
                            <td><?php echo $post->titulo ?></td>
                            <td class="d-none d-md-table-cell"><?php echo $post->descricao ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo $post->nome ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary me-2">Editar</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIM DA TABELA -->

<?php $this->endSection() ?>