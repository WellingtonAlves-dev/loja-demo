<div class='container-fluid'>
    <div class='row'>
        <h1 class='lead'>Comentarios</h1>
    </div>
    <?php if($this->session->flashdata("status_delete")) : ?>
        <div class="alert alert-danger" role="alert">
            Comentario apagado com sucesso
        </div>
    <?php endif ?>
    <div class='row mt-5'>
        <?php foreach($comentarios as $comentario) : ?>

            <div class='col-12'>
            <div class='card shadow-sm'>
                <div class='card-body row'>
                    <div class='col-md-8'>
                        <?= $comentario->comentario ?>
                    </div>
                    <div class='col-md-4'>
                        <a target="_blank" href="<?= base_url("produto/{$comentario->id_produto}") ?>" class='btn btn-primary btn-sm'>Visualizar Produto</a>
                        <a class='btn btn-danger btn-sm' href="<?= base_url("crud/deleteComentario/{$comentario->id_comentario}") ?>">Apagar comentario</a>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach ?>
    </div>
</div>