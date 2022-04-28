<?php

    $CI =& get_instance();
       
       $CI->db->where('key', 'sms_gateway_me_key')->select('id');

        if(!$CI->db->get('setting_aplikasi')->row_array())
        {
            $CI->db->insert('setting_aplikasi', ['key' => 'sms_gateway_me_key']);
        }
        
        $CI->db->where('key', 'sms_gateway_me_device_id')->select('id');
        if(!$CI->db->get('setting_aplikasi')->row_array())
        {
            $CI->db->insert('setting_aplikasi', [
                'key' => 'sms_gateway_me_device_id',
                'jenis' => 'int'
            ]);
        }

	if (!function_exists('pdd_kontak_hal')) {
		function pdd_kontak_hal(int $id = null) {
			if(!empty($id))
			{
				return call_user_func(__function__)[$id] ?? 'null';
			}

			else return [
				1 => 'Keluhan',
				2 => 'Saran & Kritik',
				3 => 'Gangguna Keamanan',
				4 => 'Permohonan Informasi'
			];
		}
	}

	if (!function_exists('kirim_sms')) {
	spl_autoload_register(function ($class) {

    // project-spethisfic namespace prefix
    $prefix = 'SMSGatewayMe\\Client\\';

    // base directory for the namespace prefix
    $base_dir = FCPATH. 'vendor/smsgatewayme/client/lib/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
// exit($file);
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
	function kirim_sms($tujuan, $pesan)
    {

    $CI =& get_instance();
        $CI->db->where("`key` = 'sms_gateway_me_key' || `key` = 'sms_gateway_me_device_id'")->select('`key`, `value`');

        foreach ($c = $CI->db->get('setting_aplikasi')->result_array() as $value) {
            $sms[$value['key']] = $value['value'];
        }

        // exit(var_dump($sms));

    	$clients = new SMSGatewayMe\Client\ClientProvider($sms['sms_gateway_me_key']);

    	$sendMessageRequest = new SMSGatewayMe\Client\Model\SendMessageRequest([
    		'phoneNumber' => $tujuan, 'message' => $pesan, 'deviceId' => $sms['sms_gateway_me_device_id']
    	]);

    	return $clients->getMessageClient()->sendMessages([$sendMessageRequest]);
    }
	}