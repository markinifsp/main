<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - Listagem de Posts (Bootstrap)</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/admin.css') ?>">
    <!-- NOVO: Summernote CSS para o editor de texto -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-lg-flex">

        <!-- SIDEBAR (Menu) -->
        <aside class="sidebar shadow-lg">
            <h2 class="fs-4 fw-bold mb-4 text-primary">Admin Blog</h2>
            <nav class="nav flex-column">
                <a class="nav-link text-white-50 rounded mb-2<?php echo ($active == 'posts' ? ' active' : '') ?>" href="<?php echo base_url('admin/posts') ?>">
                    <i class="bi bi-card-list me-2"></i> Listar Posts
                </a>
                <a class="nav-link text-white-50 rounded mb-2<?php echo ($active == 'posts/adicionar' ? ' active' : '') ?>" href="<?php echo base_url('admin/posts/adicionar') ?>">
                    <i class="bi bi-plus-square me-2"></i> Novo Post
                </a>
                <a class="nav-link text-white-50 rounded mb-2<?php echo ($active == 'categorias' ? ' active' : '') ?>" href="<?php echo base_url('admin/categorias') ?>">
                    <i class="bi bi-code-square me-2"></i> Categorias
                </a>
                <a class="nav-link text-white-50 rounded mb-2" href="<?php echo base_url() ?>">
                    <i class="bi bi-arrow-left-square me-2"></i> Ver Blog
                </a>
            </nav>
        </aside>

        <!-- CONTEÚDO PRINCIPAL -->
        <div class="flex-grow-1 main-content">
            
            <!-- BARRA SUPERIOR (NAVBAR) -->
            <nav class="navbar navbar-expand navbar-light bg-white shadow fixed-top main-navbar-desktop-fixed">
                <div class="container-fluid">
                    <span class="navbar-text ms-lg-auto me-3 fw-semibold">
                        Olá, <?php echo service('session')->get('nome') ?>
                    </span>
                    <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-box-arrow-right me-1"></i> Sair
                    </a>
                </div>
            </nav>
            <!-- FIM DA BARRA SUPERIOR -->

            <!-- CONTEÚDO (QUE ALTERA A CADA PÁGINA) -->
            <?php echo $this->renderSection('conteudo') ?>
            <!-- FIM DO CONTEÚDO -->

        </div>

    </div>

    <!-- Arquivos JS -->
    
    <!-- Incluindo jQuery (Necessário para Summernote) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <!-- Inicialização do Summernote -->
    <script>
        $(document).ready(function() {
            $('#conteudo').summernote({
                placeholder: 'Comece a escrever seu artigo aqui...',
                tabsize: 2,
                height: 350, // Altura do editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
</body>
</html>