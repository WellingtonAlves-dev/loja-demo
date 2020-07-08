<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-12'>
            <h1 class='lead'>Adicionar um novo produto</h1>
            <small class='text-muted'>Adicione um novo um produto</small>
        </div>
    </div>
    <div class='row mt-5'>
        
        <div class='col-lg-12'>

        <!-- Alertas -->

        <?php if($this->session->flashdata('insert_data') == 'success') : ?>
            <div class="alert alert-success" role="alert">
                Produto adicionado com sucesso
            </div>
        <?php endif ?>
        <?php if($this->session->flashdata('insert_data') == 'error') : ?>
            <div class="alert alert-danger" role="alert">
                Não foi possivel adicionar o produto
            </div>
        <?php endif ?>

            <form method="POST" enctype="multipart/form-data" action="<?=base_url("crud/adicionar")?>">
                <div class='form-group'>
                    <label>Nome do produto</label>
                    <input name='nome_produto' type="text" class='form-control' placeholder="Camiseta masculina">
                </div>
                <div class='form-group'>
                    <label>Preço do produto</label>
                    <input name='preco_produto' type="text" class="form-control" placeholder="29.99">
                </div>
                <div class='form-group'>
                    <label>Descrição do produto</label>
                    <textarea name='desc_produto' type="text" rows="4" class="form-control" placeholder="Camiseta masculina tamanho G"></textarea>
                </div>
                <div class='form-group'>
                    <label>Imagem do produto</label><br/>
                    <input type='file' id="imgInp" name='imagem' accept="image/*" />
                    <img class='img-fluid' height="180px" width="180px" id="blah" src="#" alt="your image" />
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