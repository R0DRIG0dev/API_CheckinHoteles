<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check-in</title>

    <style  type="text/css">
        * {font-family: Helvetica, Arial, sans-serif;}

        .container-for-gmail-android { min-width: 600px; }

        .button {padding: 30px 30px ;}

        .content-padding {padding: 20px 0 5px;}

        .mini-block {
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            background-color: #ffffff;
            padding: 12px 15px 15px;
            text-align: left;
            width: 253px;
        }

        .header-sm {
            padding: 5px 0;
            font-size: 18px;
            line-height: 1.3;
        }

        .mini-container-left {
            width: 278px;
            padding: 10px 0 10px 15px;
        }

        .mini-container-right {
            width: 278px;
            padding: 10px 14px 10px 15px;
        }

        .header-lg,
        .header-md,
        .header-sm {
            font-size: 32px;
            font-weight: 700;
            line-height: normal;
            color: #4d4d4d;
        }

        .free-text {
            width: 100% !important;
            padding: 10px 60px 0px;
        }
    </style>

    <style  type="text/css" media="only screen and (max-width: 480px)">
    @media only screen and (max-width: 480px) {
        table[class*="container-for-gmail-android"] {
            min-width: 290px !important;
            width: 100% !important;
        }

        td[class="button"] {
            padding: 5px 5px 30px !important;
        } 

        td[class="content-padding"] {
            padding: 5px 0 5px !important;
        }

        table[class="w320"] {
            width: 320px !important;
        }

        td[class="mini-container-left"],
        td[class="mini-container-right"] {
            padding: 0 15px 15px !important;
            display: block !important;
            width: 290px !important;
        }

        td[class="header-lg"] {
            font-size: 24px !important;
            padding-bottom: 5px !important;
        }

        td[class*="free-text"] {
            padding: 10px 18px 30px !important;
        }
    }
    </style>

</head>
<body>
    <table cellpadding="0" cellspacing="0" width="100%" class="container-for-gmail-android" >
        <tr>
            <td height="120" width="100%" style="background-color: #F57C00;text-align: center">
                <img src="https://hotelperunews.com/wp-content/uploads/2018/09/Casona-Plaza-Hoteles-Logo-1.jpg" alt="logo">
            </td>
        </tr>


        <tr>
            <td align="center" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" class="header-lg">¡Check-in realizado!</td>
                    </tr>
                    <tr>
                        <td align="center" class="free-text">{{$AtributoObjeto->nombreDelHotel}}</td>
                    </tr>
                    <tr>
                        <td class="w320">
                        <table align="center">
                            <tr>
                                <td class="mini-container-left">
                                    <table>
                                        <tr>
                                            <td class="mini-block">
                                                Codigo de reserva:<b>{{$AtributoObjeto->codigoDeReserva}}</b> <br />
                                                Codigo de checkin:<b>{{$AtributoObjeto->codigoDeCheckin}}</b> <br />
                                                Titular:<b>{{$AtributoObjeto->nombreDelTitular}}</b> <br />
                                                Email:<b>{{$AtributoObjeto->emailDelTitular}}</b>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="mini-container-right">
                                    <table>
                                        <tr>
                                            <td class="mini-block">
                                                Ingreso:<b>{{$AtributoObjeto->fechaIngreso}}</b> <br />
                                                Salida:<b>{{$AtributoObjeto->fechaSalida}}</b><br />
                                                Adultos:<b>{{$AtributoObjeto->N_adultos}}</b><br />
                                                Niños:<b>{{$AtributoObjeto->N_ninos}}</b>
                                            </td>
                                        </tr>
                                    </table>                                    
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <table align="center">
                            <tr>
                                <td class="button">
                                    <a href="https://www.google.com/" style="background-color:#004925; color:#ffffff; display:inline-block; text-align:center; text-decoration:none; width:155px; border-radius:5px; line-height:45px;">Imprimir</a>
                                </td>
                                <td class="button">
                                    <a href="https://www.google.com/" style="background-color:#004925; color:#ffffff; display:inline-block; text-align:center; text-decoration:none; width:155px; border-radius:5px; line-height:45px;">Editar</a>                        
                                </td>
                            </tr>
                        </table>                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>      


        <tr>
            <td align="center">
            <table >
                <tr>
                    <td align="center">
                    <table>
                        <tr>
                            <td class="button">
                                <a href="{{route('PDF_terminosCondiciones',['id'=> $AtributoObjeto->codigoDeCheckin ]) }}" style="background-color:#F57C00; color:#ffffff; display:inline-block; text-align:center; text-decoration:none; width:185px; border-radius:5px; line-height:45px;">Términos y condiciones</a>
                            </td>
                            <td class="button">
                                <a href="{{ route('PDF_parteDeEntrada',['id'=>$AtributoObjeto->codigoDeCheckin]) }}" style="background-color:#F57C00; color:#ffffff; display:inline-block; text-align:center; text-decoration:none; width:155px; border-radius:5px; line-height:45px;">Parte de entrada</a>
                            </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                    <table >
                        <tr>
                            <td style="text-align: center">
                                <img src="https://casonaplazahoteles.com/wp-content/uploads/2017/11/LOGO-CASONA.svg" alt="logo">
                            </td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>

            </td>
        </tr>


        <tr>
            <td align="center" style="background-color: #f7f7f7; height: 100px;">
                <table>
                    <tr>
                        <td  align="center" style="padding: 25px 0 25px">
                            <strong>Awesome Inc</strong><br />
                            1234 Awesome St <br />
                            Wonderland <br /><br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
    </table>
</body>
</html>