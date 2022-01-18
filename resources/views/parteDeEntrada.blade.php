<!DOCTYPE html>
<html>
<head>
  <title>Parte de entrada</title> 
  <style>
      body{
        font-family: sans-serif;
      }
      @page {
        margin: 150px 50px;
      }

      header { position: fixed;
        left: 0px;
        top: -130px;
        right: 0px;
        height: 110px;
        /*background-color: #ddd;*/
        text-align: center;
        line-height: 7px;
      }

      h1{
        text-align: center;
      }

      footer {
        position: fixed;
        left: 0px;
        bottom: -50px;
        right: 0px;
        height: 40px;
        border-bottom: 2px solid #ddd;
      }
      footer .page:after {
        content: counter(page);
      }
      footer table {
        width: 100%;
      }
      footer p {
        text-align: right;
      }
      footer .izq {
        text-align: left;
      }      

  </style>
</head>
<body>
  <header>
    <table width="100%">
      <tr>
        <td width="80%">
          <img src="https://hotelperunews.com/wp-content/uploads/2018/09/Casona-Plaza-Hoteles-Logo-1.jpg"width="280" height="100" alt="logo">
        </td>    
        <td width="50%" align="center">
          <p><b>{{$DatosNecesarios->hoteles_nombre}}</b></p>
          <p>{{$DatosNecesarios->hoteles_direccion}}</p>
          <p>{{$DatosNecesarios->hoteles_email}}</p>
          <p>{{$DatosNecesarios->hoteles_telefono}}</p>          
        </td>
      </tr>
    </table>
  </header>

  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              reserva: {{$c->checkins_idreserva}} checkin: {{$c->checkins_id}}
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>  

  <h1>PARTE DE ENTRADA</h1>
  Fecha de checkin:<b>{{$c->checkins_fechaIngresoCheckin}}</b> <br />
  Codigo de reserva:<b>{{$c->checkins_idreserva}}</b> <br />
  Codigo de checkin:<b>{{$c->checkins_id}}</b> <br />

  <table border="1" width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0px 30px 0px;">
    <tr>
      <td>
        <table align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <b>DETALLES DEL CHECKIN</b>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table width="100%"border="1"cellpadding="0"cellspacing="0"frame="void"rules="rows">
          <tr>
            <td>
              <b>TITULAR</b>
            </td>
            <td>
              <b>ENTRADA</b>
            </td>
            <TD>
              <b>SALIDA</b>
            </TD>
            <td>
              <b>ADULTOS</b>
            </td>
            <td>
              <b>NIÑOS</b>
            </td>          
          </tr>

          <tr>
            <td>
              {{$elTitular->huespedes_nombre.' '.$elTitular->huespedes_apellido}}
            </td>
            <td>
              {{$c->checkins_fechaEntradaReserva}}
            </td>
            <TD>
              {{$c->checkins_fechaSalidaReserva}}
            </TD>
            <td>
              {{$c->checkins_adultos}}
            </td>
            <td>
              {{$c->checkins_ninos}}
            </td>          
          </tr>

        </table>
      </td>
    </tr>    
  </table>
  <h1>DATOS DE LOS HUESPEDES</h1>

  @foreach($listahuestedes as $huesped)

    <table border="1" width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0px 30px 0px;">
      <tr>
        <td>
          <table align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
                <b>Pasajero: {{$huesped->huespedes_nombre.' '.$elTitular->huespedes_apellido}}</b>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="1" cellpadding="0" cellspacing="0" frame="void" rules="rows">
            <tr>
              <td width="33.3%">
                <b>Nombres:</b><br />{{$huesped->huespedes_nombre}}
              </td>
              <td width="33.3%">
                <b>Apellidos:</b><br />{{$huesped->huespedes_apellido}}
              </td>
              <TD width="33.3%">
                <b>email:</b><br />{{$huesped->huespedes_email}}
              </TD>         
            </tr>

            <tr>
              <td>
                <b>Nacionalidad:</b><br />{{$huesped->huespedes_nacionalidad}}
              </td>
              <td>
                <b>Tipo de documento:</b><br />{{$huesped->huespedes_tipoDocumento}}
              </td>
              <TD>
                <b>N°de documento:</b><br />{{$huesped->huespedes_numeroDocumento}}
              </TD>         
            </tr>

            <tr>
              <td>
                <b>DNI foto frontal:</b><br />
                <img src="{{ route('documentos.buscarArchivo',['archivo'=>$c->checkins_id.'_'.$huesped->huespedes_numeroDocumento.'_A.jpg']) }}" width="180" height="150">
              </td>
              <td>
                <b>DNI foto posterior:</b><br />
                <img src="{{ route('documentos.buscarArchivo',['archivo'=>$c->checkins_id.'_'.$huesped->huespedes_numeroDocumento.'_D.jpg']) }}" width="180" height="150">
              </td>
              <TD>
                <b>Firma digital:</b><br />
                <img src="{{ route('documentos.buscarArchivo',['archivo'=>$c->checkins_id.'_'.$huesped->huespedes_numeroDocumento.'_F.jpg']) }}" width="180" height="150">
              </TD>         
            </tr>

          </table>
        </td>
      </tr>    
    </table>
  
  @endforeach
</body>
</html>
