<?php include_once('_adminHeader.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#D9DBD4;">
   
    <div>
    <div class="col-lg-12">
        <!--notification start-->
            <div class="callout callout-danger ">
                <h1 class="text-center">¡Gestión de Galeria!</h1>
                <hr style="border: 2px solid #000000;">
            </div>
            <br>
            <div class="row">   
                <div class="col-md-2 col-md-offset-1 col-xs-4">
                    <button type="button" class="btn btn-app btn-google" data-toggle="modal" data-target="#myModalAltaGaleria" style="color:black">
                        <i class="fa fa-calendar"></i>
                        <p style="font-size:16px ">Alta</p>
                    </button>
                </div>
            </div>
            <hr />
            <div class="box-body table-responsive no-padding">
                <table id="tableView" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Imagen_URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Esto se obtiene desde JS-->
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </section>
        <!--notification end-->
    </div>
</div>

<!-- Modal Alta Evento -->
<div class="modal fade" id="myModalAltaGaleria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Alta de Imagen</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form action="/Home/GaleriaSubir" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <!--cargar imagen-->
                            
                            <div class="form-group">
                                <label><br />Imagen de Galeria (.jpg, .png, .jpeg):</label>
                                <input id="txtfile" type="file" name="file" accept=".jpg,.png,.jpeg" />
                            </div>
                            
                            <div class="form-group has-feedback col-md-6 col-md-offset-3">
                                <br />
                                <input type="submit" class="btn btn-google btn-block text-center" value="Guardar..." />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modificar de Multimedia -->
<div class="modal fade" id="myModalModGaleria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Modificación de Ponientes</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form action="#" id="formModGaleria" name="formModGaleria" autocomplete="off">
                        <div class="row">
                             <!--cargar imagen-->
                            
                            <div class="form-group">
                                <label><br />Imagen de Galeria (.jpg, .png, .jpeg):</label>
                                <input id="txtfile" type="file" name="file" accept=".jpg,.png,.jpeg" />
                            </div>
                            <div class="form-group has-feedback col-md-6 col-md-offset-3">
                                <br />
                                <input type="submit" class="btn btn-google btn-block text-center" value="Modificar..." />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalAltaExitosa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">@ViewBag.Galeria</h4>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var id;
    var vid = document.getElementById("myVideo");

    $("body").on("click", "#tableView .ModificarTransicion", function () {
        id = $(this).attr("id")
        $('#myModalModGaleria').modal('show');
        $('#idTrans').val(id);
    });

    $("#formModGaleria").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/Home/GaleriaModificar",
            data: str,
            success: function (response) {
                if (response == "OK") {
                    $('#myModalModGaleria').modal('hide'); //Cerramos ventana modal $(#<id ventana modal>).modal('hide');
                    $('#formModGaleria').trigger("reset"); //Limpiamos formulario de la ventana modal $('#<id formulario>').trigger("reset");
                    alert("Actualización de Multimedia realizada correctamente.")
                    $('#tableView').empty()
                }
                else {
                    $('#myModalModGaleria').modal('hide'); //Cerramos ventana modal $(#<id ventana modal>).modal('hide');
                    $('#formModGaleria').trigger("reset"); //Limpiamos formulario de la ventana modal $('#<id formulario>').trigger("reset");
                    alert("Actualización de Multimedia no fue realizada.");
                    console.log(response);
                }
            }
        });
    });


</script>


<!--
<script type="text/javascript">
    $(document).ready(function () {
        console.log('@ViewBag.Galeria')
        if ('@ViewBag.Galeria' != "")
        {
            $('#myModalAltaExitosa').modal('show');
        }
    });
</script>
  -->  
    
</div>

<?php include_once('_adminFooter.php'); ?>