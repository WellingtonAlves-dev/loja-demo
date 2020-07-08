      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" style="height: 300px;" src="<?= base_url("public/uploads/{$produto[0]->foto}") ?>" >
          <div class="card-body">
            <h3 class="card-title"><?=$produto[0]->nome_produto?></h3>
            <h4>R$ <?= $produto[0]->preco_produto ?></h4>
            <p class="card-text"><?= $produto[0]->descricao_produto ?></p>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <!-- Comentarios -->
            <?php foreach($comentarios as $comentario): ?>
              <p><?= $comentario->comentario ?></p>
                <small class="text-muted"><?= $comentario->data ?></small>
              <hr>
            <?php endforeach ?>
            <!-- Comentarios -->
            <button class="btn btn-success" data-toggle="modal" data-target="#comentarioModal" >Comentar</button>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>

  <div class="modal fade" id="comentarioModal" tabindex="-1" role="dialog" aria-labelledby="ComentarioModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deixe um comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url("crud/addComentario") ?>" >
          <div class='form-group'>
            <label>Seu comentario</label>
            <input type="hidden" name='id_produto' value="<?= $produto[0]->id_produto ?>">
            <textarea class='form-control' name='comentario' rows="4"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Comentar</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- /.container -->
