<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Links Scripts-->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!--<script src="assets/js/message_errors.js"></script>-->

    <!--Links CSS-->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />

    <title>SAA</title>
</head>
<body>

    <h3>Terminais</h3>
    <div class="p-0">
        <?php foreach($dados['terminais'] as $row) { ?>
                <?php echo $row['numero']; ?> -
                <?php echo $row['ponto']; ?> -
                <?php echo $row['uf']; ?> -
                <?php echo $row['tipo']; ?> -
                <?php echo $row['marca']; ?> -
                <?php echo $row['modelo']; ?> -
                <?php echo $row['serie']; ?> -
                <?php echo $row['ip']; ?> - 
                
                <a href="index.php?controller=terminais&action=modal&numero=<?php echo $row['numero']; ?>" class="btn btn-success view_modal">Modal</a>
                
            <hr/>
        <?php } ?>
    </div>

    <div>
        <form action="index.php?controller=terminais&action=export" method="POST" name="export_excel" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <input type="submit" name="Export" class="btn btn-success" value="Exporta para Excel" />
                </div>
            </div>
        </form>
    </div>
    <hr/>
    <div>
        <form id="formImport" action="index.php?controller=terminais&action=import" method="POST" name="export_excel" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <input type="file" name="file" id="file" class="input-large" />
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                </div>
            </div>
        </form>
    </div>

    <div class="erro"></div>

    <!-- Modal -->
    <div class="modal fade" id="detalhes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <script>
        $('.view_modal').on('click', function(event){
            event.preventDefault();

            $("#detalhes").modal('show').find('.modal-content').load($(this).attr('href'));
        });
    </script>
</body>
</html>