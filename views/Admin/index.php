<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-12'>
            <h1 class='lead'>Produtos</h1>
            <small class='text-muted'>Todos os produtos da loja</small>
        </div>
    </div>
    <div class='row mt-5'>
        <div class='col-12'>
            <div class='card w-100'>
                <div class='card-header'>
                    <a class='btn btn-success btn-sm' href="<?= base_url("admin/novo") ?>" >Adicionar um novo produto</a>
                </div>
            </div>
        </div>
    </div>
    <?php if($this->session->flashdata('deleteStatus')): ?>
        <div class="alert alert-success" role="alert">
            Produto apagado com sucesso.
        </div>
    <?php endif ?>
    <div class='row mt-2'>
        <?php foreach($produtos as $produto): ?>

            <div class='col-12 my-1'>
            <div class='card w-100 shadow-sm'>
                <div class='card-body row'>
                    <div class='col-3'>
                        <h5><?=$produto->nome_produto?></h5>
                        <small class='text-muted'>R$ <?=$produto->preco_produto?></small>
                    </div>
                    <div class='col-6'>
                        <?=substr($produto->descricao_produto, 0, 100).'...'?>
                    </div>
                    <div class='col-3'>
                        <a href="<?= base_url("produto/{$produto->id_produto}") ?>" class='btn btn-sm btn-primary'>Visualizar</a>
                        <a href="<?= base_url("admin/editar/{$produto->id_produto}") ?>" class='btn btn-sm btn-warning'>Editar</a>
                        <a href="<?= base_url("crud/apagar/{$produto->id_produto}") ?>" class='btn btn-sm btn-danger'>Excluir</a>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach ?>
    </div>
</div>