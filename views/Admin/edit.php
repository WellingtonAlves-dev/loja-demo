<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-12'>
            <h1 class='lead'>Editar o produto <?= $data[0]->nome_produto ?></h1>
            <small class='text-muted'>Adicione um novo um produto</small>
        </div>
    </div>
    <div class='row mt-5'>
        
        <div class='col-lg-12'>

        <!-- Alertas -->

        <?php if($this->session->flashdata('edit_data') == 'success') : ?>
            <div class="alert alert-success" role="alert">
                Produto Editado com sucesso
            </div>
        <?php endif ?>

            <form method="POST" enctype="multipart/form-data" action="<?=base_url("crud/editar")?>">
                <div class='form-group'>
                    <label>Nome do produto</label>
                    <input type="hidden" name='id_produto' value="<?= $data[0]->id_produto ?>">
                    <input name='nome_produto' type="text" class='form-control' value="<?= $data[0]->nome_produto ?>">
                </div>
                <div class='form-group'>
                    <label>Preço do produto</label>
                    <input name='preco_produto' type="text" class="form-control" value="<?= $data[0]->preco_produto ?>">
                </div>
                <div class='form-group'>
                    <label>Descrição do produto</label>
                    <textarea name='desc_produto' type="text" rows="4" class="form-control" ><?= $data[0]->descricao_produto?></textarea>
                </div>
                <div class='form-group'>
                    <label>Imagem do produto</label><br/>
                    <input type='file' id="imgInp" name='imagem' accept="image/*" />
                    <img class='img-fluid' height="180px" width="180px" id="blah" src="<?= base_url("public/uploads/".$data[0]->foto) ?>" alt="your image" />
                </div>
                <div class='form-group'>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                    <br/>
                    <small>Obrigatorio preencher todos os formularios</small>
                </div>
            </form>
        </div>
    </div>
</div>