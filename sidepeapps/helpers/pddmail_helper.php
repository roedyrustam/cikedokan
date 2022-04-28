<?php use PHPMailer\PHPMailer\PHPMailer;

if(!function_exists('pdd_gmail_send'))
{
	function pdd_gmail_send($destination, $subject, $body, $attachment = null, $debug = 0)
	{
		$ci = get_instance();
		
		$config = $ci->db->query("SELECT * FROM `setting_aplikasi` WHERE `kategori` = 'email.config'")->result_array();

		foreach ($config as $value) {
			$config[$value['key']] = $value['value'];
		}

		$body .= '<div><p style="text-align: center;"><small>';
		$body .= 'Email ini dikirim menggunakan aplikasi ';
		$body .= '<b><a href="https://portaldesadigital.id">';
		$body .= 'Portal Desa Digital';
		$body .= '</a></b>';
		$body .= '</small></p></div>';

		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = $config['email_server']; //hostname masing-masing provider email
		$mail->SMTPDebug = $debug;
		$mail->Port = 465;
		$mail->MessageDate = time();
		$mail->MessageID = 1;
		$mail->SMTPAuth = true;
		$mail->Username = $config['email_username']; //user email
		$mail->Password = $config['email_password']; //password email
		$mail->SetFrom($config['email_username'], $config['email_sender']); //set email pengirim
		$mail->Subject = $subject; //subyek email
		$mail->AddAddress($destination); //tujuan email
		$mail->MsgHTML($body);
		
		if(is_array($attachment))
		{
			foreach ($attachment as $value) {
				if (is_string($value) && is_file($value)) {
					$mail->AddAttachment($value);
				}
			}
		}

		elseif (is_string($attachment) && is_file($attachment)) {
			$mail->AddAttachment($attachment);
		}
	
		ob_start(); $mail->Send(); ob_end_clean();
	}
}
