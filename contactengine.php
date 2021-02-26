<?php

$EmailFrom = "Bravados@solicitud";
$EmailTo = "Capi@bravados.mx";
$Subject = "Bravados solicitud";
$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 
$Fded = Trim(stripslashes($_POST['Fded'])); 
$Fdem = Trim(stripslashes($_POST['Fdem'])); 
$Fdea = Trim(stripslashes($_POST['Fdea'])); 
$Lgde = Trim(stripslashes($_POST['Lgde'])); 
$Hdev = Trim(stripslashes($_POST['Hdev'])); 
$Cinvtd = Trim(stripslashes($_POST['Cinvtd'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Nombre: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Telefono: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "E mail: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Como nos conseguiste: ";
$Body .= $Message;
$Body .= "\n";
$Body .= "Dia del evento: ";
$Body .= $Fded;
$Body .= "\n";
$Body .= "Mes del evento: ";
$Body .= $Fdem;
$Body .= "\n";
$Body .= "Año del evento: ";
$Body .= $Fdea;
$Body .= "\n";
$Body .= "Lugar del evento: ";
$Body .= $Lgde;
$Body .= "\n";
$Body .= "Hora del evento: ";
$Body .= $Hdev;
$Body .= "\n";
$Body .= "Cantidad de invitados: ";
$Body .= $Cinvtd;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>