<?php
class Kripto
{
	
	function enkripsi($data=null, $key=null)
	{
		$iv = random_bytes(16);
		return $cipherText = ['rows'=>base64_encode(openssl_encrypt($data, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv)), 'iv'=>base64_encode($iv)];
	}

	function dekripsi($data=null, $key=null)
	{
		$cipherText = base64_decode($data['data']);
		$iv = base64_decode($data['iv']);
		return $plainText = json_decode(openssl_decrypt($cipherText, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv));
	}
}