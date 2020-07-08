      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php foreach($slides as $key => $slide) :?>
              <div class="carousel-item <?= ($key == 0) ? 'active' : null; ?>">
                <img style="height: 200px; width:900px" class="d-block img-fluid" src="<?= base_url("public/uploads/{$slide->slide}") ?>" alt="First slide">
              </div>  
            <?php endforeach ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

        <?php foreach($produtos as $produto): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" height="180" width="400" src="<?= base_url("public/uploads/{$produto->foto}") ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="<?= base_url("produto/{$produto->id_produto}") ?>"><?= $produto->nome_produto ?></a>
                  </h4>
                  <h5>R$ <?= $produto->preco_produto?> </h5>
                  <p class="card-text"><?= substr($produto->descricao_produto, 0, 100); ?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Wellington Alves</small>
                </div>
              </div>
            </div>
        <?php endforeach ?>


        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
