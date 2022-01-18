<!DOCTYPE html>
<html>
<head>
	<title>Terminos y Condiciones</title>	
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 4cm 2cm 2cm;
        }
 
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 1cm;
            height: 0cm;
            color: black;
            text-align: right;
            line-height: 7px;
        }
 
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #0b4429;
            color: white;
            text-align: center;
            line-height: 20px;
        }
        h1{
        	text-align: center;
        }
        h2{
        	text-align: center;
        }
    </style>
</head>
<body>
	<header>
    		<p><b>{{$DatosNecesarios->hoteles_nombre}}</b></p>
    		<p>{{$DatosNecesarios->hoteles_direccion}}</p>
    		<p>{{$DatosNecesarios->hoteles_email}}</p>
    		<p>{{$DatosNecesarios->hoteles_telefono}}</p>
    		<h1>TÉRMINOS Y CONDICIONES</h1>
			<h2>Uso del hotel</h2>
	</header>
	<p>1)El hotel no se responsabiliza por objetos de valor introducido y dejado en su habitación sin conocimiento de la
administración (Código civil).</p>
	<p>2)La reserva de la habitación no está ligada a un espacio en la cochera. Una vez realizado el pago por alojamiento
reservas y otros servicios del hotel no hay lugar a reclamo ni devolución.</p>
	<p>3)se aceptan canjes fuera de tiempo de boleta por factura. Todo consumo deberán ser cancelados – por adelantado
sea este por alojamiento o por servicios Para efectos de crédito de hospedaje y otros servicios se deberá
dejar garantía (efectivo y/o voucher firmado).</p>
	<p>4)El hotel no se responsabiliza, bajo ninguna circunstancia por cualquier daño producido por terceros al vehículo
o la pérdida total o parcial de sus accesorios, mientras este se encuentre dentro y/o fuera del estacionamiento.</p>
	<p>5)El servicio de estacionamiento no comprende el deber de vigilancia por parte del Hotel sino únicamente la
sesión temporal del uso de una rea para parqueo.</p>
	<p>6)Solo se considera como huésped a la persona registrada en el hotel. El huésped se compromete a entregar la
habitación tal como se le fue entregada.</p>
	<p>7)Cualquier daño o deterioro producido por el huésped dentro de las instalaciones serán asumidos por el titular.
Para efectuar un check out rápido avisar 10 minutos antes para la elaboración de su cuenta.</p>
	<p>8)retiro del huésped registrado, toda visita que tuviera deberá dejar la habitación y/o identificarse. Toda visita
deberá ser recibida en el lobby y/o cafetería.</p>
	<p>9)Elcustodia pudiendo ser vendidas, rematadas por el hotel en un plazo de 3 meses de la fecha de entrega
(custodia). La empresa podrá vender, rematar, obsequiar dichos objetos después de la fecha limite (3 meses).
Las llamadas telefónicas deberán de contar con garantía en efectivo y/o voucher firmado para realizar las llamadas.
Toda custodia será entregado solo al propietario del bien. El usuario de custodia se obliga a cumplir el
reglamento interno del hotel. En caso que el pago se efectué con tarjeta de crédito las devoluciones serán vía
banco de ningún modo en efectivo. Está prohibido introducir en las habitaciones planchas, velas, microondas, art.
Inflamables, etc. Autorizo a la empresa a retirar mi equipaje de la habitación en caso no hubiera cancelado mis
hospedaje hasta antes del 12 MD. Sin lugar a reclamo. Para asegurar el uso de mi habitación y de esta manera
permanencia y estadía deberá de pagar el costo de la habitación un día antes. Todo pago realizado después del
½ día será actualizado a tarifa rack (tarifa normal). El pago por ½ tarifa de estadía tendrá una salida máximo a las
19:00 horas y el pago será calculado en base al 50% de la tarifa rack (normal). Los pagos de alojamiento no
podrán ser utilizados para cubrir consumos ni llamadas y viceversa. La apertura de las cajas de seguridad (caja
fuerte) de las habitaciones podrán ser aperturadas a solicitud del huésped en hora de oficina, por ningún motivo
se aceptara otro horario (Lunes a Viernes de 09:00 a 17:00).</p>
	<p>9)El hotel no se responsabiliza por objetos de valor introducido y dejado en su habitación sin conocimiento de la
administración (Código civil).</p>
	<p>10)La reserva de la habitación no está ligada a un espacio en la cochera. Una vez realizado el pago por alojamiento
reservas y otros servicios del hotel no hay lugar a reclamo ni devolución.</p>
	<p>11)se aceptan canjes fuera de tiempo de boleta por factura. Todo consumo deberán ser cancelados – por adelantado
sea este por alojamiento o por servicios Para efectos de crédito de hospedaje y otros servicios se deberá
dejar garantía (efectivo y/o voucher firmado).</p>
	<p>12)El hotel no se responsabiliza, bajo ninguna circunstancia por cualquier daño producido por terceros al vehículo
o la pérdida total o parcial de sus accesorios, mientras este se encuentre dentro y/o fuera del estacionamiento.</p>
	<p>13)El servicio de estacionamiento no comprende el deber de vigilancia por parte del Hotel sino únicamente la
sesión temporal del uso de una rea para parqueo.</p>
	<p>14)Solo se considera como huésped a la persona registrada en el hotel. El huésped se compromete a entregar la
habitación tal como se le fue entregada.</p>
	<p>15)Cualquier daño o deterioro producido por el huésped dentro de las instalaciones serán asumidos por el titular.
Para efectuar un check out rápido avisar 10 minutos antes para la elaboración de su cuenta.</p>
	<h2>CÓDIGO DE RESERVA ACEPTADA</h2>
	<p>Fecha del Checkin:<b>{{$FechaDeCheckin}}</b></p>
	<p>Adultos:<b>{{$cantidadDeAdultos}}</b></p>
	<p>Niños:<b>{{$cantidadDeNinos}}</b></p>
	<p>Titular:<b>{{$nombreTitular}}</b></p>

	<table align="center" border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
		<tr>
			<td align="center">
                <!-- este bloque bota:Image not found or type unknown -->
                <!-- <img src="{{ public_path($idDeCheckin.'_'.$DNItitular.'_D.jpg') }}" alt="logo" width="150" height="150"> -->

                <img src="{{ route('documentos.buscarArchivo',
                ['archivo'=>$idDeCheckin.'_'.$DNItitular.'_A.jpg']) }}" alt="logo" width="180" height="150">
			</td>
			<td align="center">
				<img src="{{ route('documentos.buscarArchivo',
                ['archivo'=>$idDeCheckin.'_'.$DNItitular.'_D.jpg']) }}" alt="logo" width="180" height="150">
			</td>
			<td align="center">
				<img src="{{ route('documentos.buscarArchivo',
                ['archivo'=>$idDeCheckin.'_'.$DNItitular.'_F.jpg']) }}" alt="logo" width="180" height="150">
			</td>
		</tr>
	</table>

	<footer>
    	<h1>DOCUMENTO FIRMADO DIGITALMENTE EN SISTEMA CHECKIN: COD DE CHECKIN: 100</h1>
	</footer>
</body>
</html>