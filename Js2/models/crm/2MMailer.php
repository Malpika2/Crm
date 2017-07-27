<?php 
/**
* 
*/
class mMailer extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('my_phpmailer');
	}
	public function enviarCorreo($s,$param){
		$numTarea=$s;
		$this->db->select('*');
		$this->db->from('Participantes_Tareas');
		$this->db->join('Correos','Correos.idUsuario = Participantes_Tareas.idUsuario');
		$this->db->where('idTarea',$s);
		$s = $this->db->get();
		$row_Asignados = $s->result();

		$mail = new PHPMailer();
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'b5db8e329e0021';                 // SMTP username
		$mail->Password = '6fd5d84c79c4db';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 2525;                                    // TCP port to connect to

		$mail->setFrom('from@example.com', 'Admin-CRM');
		foreach($row_Asignados as $Asignado){
			$mail->addAddress($Asignado->Correo1);
		}
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$urlbase= base_url();
		$mail->Subject = 'Evento CRM-'.$param['TituloTarea'].'';
		$mail->Body    = '<h1>Tienes un evento!:</h1> <br> Descripcion: <b>'.$param['Descripcion'].'</b> <br> Fecha Limite del evento:'.$param['FechaFin'].'<br>Revisar: '.$urlbase.'cPersona/verTarea/'.$numTarea.'';
		$mail->AltBody = 'Descripcion: '.$param['Descripcion'].'';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		}

	}
	public function enviarCorreoNegociacion($param){


		$this->db->select('*');
		$this->db->from('Usuarios');
		$this->db->join('Correos','Correos.idUsuario = Usuarios.idUsuario');
		$this->db->where('Usuarios.idUsuario',$param['PersonaCargo']);
		$s = $this->db->get();
		$row_Usuario = $s->row();

		$mail = new PHPMailer;
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'b5db8e329e0021';                 // SMTP username
		$mail->Password = '6fd5d84c79c4db';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 2525;                                    // TCP port to connect to

		$mail->setFrom('from@example.com', 'Admin-CRM');
		$mail->addAddress($row_Usuario->Correo1);
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$urlbase= base_url();
		$mail->Subject = 'Evento CRM-'.$param['NombreNegociacion'].'';
		$mail->Body    = '<h1>Tienes un evento!:</h1> <br> Descripcion: <b>'.$param['Detalles'].'</b> <br> Fecha Limite del evento:'.$param['FechaLimite'].'<br>';
		$mail->AltBody = 'Descripcion: '.$param['Detalles'].'';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    // echo 'Message has been sent';
		}

	}
}