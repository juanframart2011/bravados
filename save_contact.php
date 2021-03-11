<?php
if(!$_POST) exit;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$comment = $_POST["comment"];

if( !empty( $name ) && !empty( $email ) && !empty( $comment ) && !empty( $phone ) ){

	try{

		if(get_magic_quotes_gpc()) {
			$comments = stripslashes($comments);
		}

		$to = "mario@amoralamexicana.com";
		#$to = "juanframart2011@gmail.com";
	    $subject = 'Comentario de la Página amoralamexicana.com';
	    $from = $email;

	    // To send HTML mail, the Content-type header must be set
	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	    // Create email headers
	    $headers .= 'From: '.$from."\r\n".
	    'Reply-To: '.$from."\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	    // Compose a simple HTML email message
	    $message = '<html><body>';
	    $message .= '<p style="color:#080;font-size:18px;">
	    Los datos obtenidos de la página son los siguientes:<br>
	    Nombre: '.$name.'<br>
	    Correo: '.$email.'<br>
	    Número de telefono: '.$phone.'<br>
	    Comentario: <strong>'.$comment.'</strong>';
	    $message .= '</p></body></html>';

	    // Sending email
	    if( mail( $to, $subject, $message, $headers ) ){
	    
	        echo json_encode( array(
				"result" => 1,
				"message" => "Felicidades se registro con exito."
			) );
			return false;
	    }
	    else{
	    
	        echo json_encode( array( 'success' => 0, 'message' => 'Error enviando el mensaje. ' ) );
	        return false;
	    }
	}
	catch (Exception $e) {

        echo json_encode( array( 'success' => 0, 'message' => 'Error enviando el mensaje.' ) );
        return false;
    }
}
else{

	echo json_encode( array(
		"result" => 2,
		"message" => "Los campos son obligatorios"
	) );
}
?>