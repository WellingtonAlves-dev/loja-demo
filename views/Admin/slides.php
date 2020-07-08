<div class='container-fluid'>

    <div class='row'>
            <div class='col-md-12'>
                <h1 class='lead'>Slides</h1>
                <small class='text-muted'>Gerenciar slides da homepage</small>
            </div>
    </div>
    <div class='row mt-5'>
        <div class='col-lg-12'>

        <?php $slide_status = $this->session->flashdata("slide_status"); ?>
        <?php if(isset($slide_status) && $slide_status['status'] == 'success') : ?>
            <div class="alert alert-success" role="alert">
                <?= $slide_status['msg'] ?>
            </div>
        <?php endif ?>
        <?php if(isset($slide_status) && $slide_status['status'] == 'error') : ?>
            <div class="alert alert-danger" role="alert">
                <?= $slide_status['msg'] ?>
            </div>
        <?php endif ?>


            <div class='card shadow-sm'>
                <div class='card-header'>
                    <form method="POST" enctype="multipart/form-data" action="<?= base_url("crud/addslide") ?>" >
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" lang="pt-br" name='imagem' accept="image/*">
                        <label class="custom-file-label" for="customFileLang">Selecionar arquivo</label>
                        <button type="submit" class='btn btn-success btn-sm mt-1'>Adicionar imagem</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach($slides as $slide) : ?>
            <div class='col-lg-4'>
            <div class='card shadow-sm'>
                <div class='card-body'>
                    <img style="height: 130px; width: 300px;" class="d-block img-fluid" src="<?= base_url("public/uploads/{$slide->slide}") ?>" alt="First slide">
                </div>
                <div class='card-footer'>
                    <a href="<?= base_url("crud/deleteSlide/{$slide->id_slide}") ?>" class='btn btn-danger btn-sm'>Apagar</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>

</div>