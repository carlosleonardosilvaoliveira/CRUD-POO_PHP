
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?controller=terminais&action=update" method="post">
          <input type="hidden" name="numero" value="<?php echo $dados["terminais"]->numero ?>"/>
              Numero: <input type="text" name="numero" value="<?php echo $dados["terminais"]->numero ?>" class="form-control"/>
              Ponto: <input type="text" name="ponto" value="<?php echo $dados['terminais']->ponto ?>" class="form-control"/>
              UF: <input type="text" name="uf" value="<?php echo $dados['terminais']->uf ?>" class="form-control"/>
              Tipo: <input type="text" name="tipo" value="<?php echo $dados['terminais']->tipo ?>" class="form-control"/>
              Marca: <input type="text" name="marca" value="<?php echo $dados["terminais"]->marca ?>" class="form-control"/>
              Modelo: <input type="text" name="modelo" value="<?php echo $dados['terminais']->modelo ?>" class="form-control"/>
              Serie: <input type="text" name="serie" value="<?php echo $dados['terminais']->serie ?>" class="form-control"/>
              IP: <input type="text" name="ip" value="<?php echo $dados['terminais']->ip ?>" class="form-control"/>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" value="Atualizar" class="btn btn-success"/>
        </form>
      </div>