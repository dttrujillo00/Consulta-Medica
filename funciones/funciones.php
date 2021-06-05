<?php  

$today = date("d") . "-" . date("m") . "-" . date("Y");

function calcularEdad($nacimiento, $hoy)
{
    $valoresNacimiento = explode("-", $nacimiento);
    $valoresHoy = explode("-", $hoy);

    $diaNacimiento = $valoresNacimiento[2];
    $mesNacimiento = $valoresNacimiento[1];
    $anyoNacimiento = $valoresNacimiento[0];

    $diaHoy = $valoresHoy[0];
    $mesHoy = $valoresHoy[1];
    $anyoHoy = $valoresHoy[2];

    $edad = $anyoHoy - $anyoNacimiento;

    if ($mesNacimiento > $mesHoy) {
        return $edad - 1;
    } else if($mesNacimiento < $mesHoy){
        return $edad;
    }else if($diaNacimiento < $diaHoy){
        return $edad - 1;
    } else {
        return $edad;
    }
}

?>