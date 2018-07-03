@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style=" border-top-color: #2ECCFA;border-right-color: #2ECCFA; border-bottom-color: #2ECCFA; border-left-color: #2ECCFA;">
                <div class="card-header"style="background-color:#2E9AFE; color:#ffff; font-size: 200%;">Generar clave</div>

                <div class="card-body">

                    <form class="form-horizontal" role="form" action="/clave" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">


                      <div class="form-group">
                        <label for="sucursal" class="col-lg-5 control-label" style="font-size: 200%; color:#2ECCFA;">Sucursal</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="clave" placeholder="Sucursal" required name="sucursal" onkeypress="return valida(event)" style="font-size:150%;">
                        </div>
                      </div>
                      @if( ! empty($claveencri))

                        <div class="form-group">
                          <label for="ejemplo_email_3" class="col-lg-4 control-label" style="font-size: 200%; color:#2ECCFA;">Clave</label>
                          <div class="col-lg-10">
                            <input type="text" name="clave" class="form-control" id="clave" readonly value="{{$claveencri}}" style="font-size:150%;">
                          </div>
                        </div>

                        @endif

                        <div class="form-group">
                          <label for="ejemplo_email_3" class="col-lg-5 control-label" style="font-size: 200%; color:#2ECCFA;">Descuento</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" id="descuento" required placeholder="Descuento" name="descuento" onblur="validardescuento()" style="font-size:150%;">
                          </div>
                        </div>

                        <center>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary" style="font-size: 200%;">Generar clave</button>
                          </div>
                        </div>
                      </center>

                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <center>
    <img src="logoinicio.jpg" class="rounded-circle" alt="Cinque Terre" width="50%" height="50%" id="imagenmover">
  </center>
</div>

<script>


$(document).ready(function() {
       $("#imagenmover").animate({right: "10%", height: "30%", width: "30%"},5000);
  });


function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validardescuento() {
    var descuento = document.getElementById("descuento");
    var long =document.getElementById("descuento").value.length;

    if (long<=2)
    {
      if(long==2)
      {
        descuento.value=descuento.value+".0";
      }
      if(long==1) {
        descuento.value="0"+descuento.value+".0";
      }
      if (long==0) {
        descuento.value="00.0";
      }
    }
}

</script>
@endsection
