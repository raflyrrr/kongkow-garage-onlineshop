<?php
/**
 * 
 */
class Rajaongkir extends CI_Controller
{
	private $api_key = '3dd5b869f0e7c5865040397c5d34553a';
	public function province()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			$array_response = json_decode($response, true);
			$data_province = $array_response['rajaongkir']['results'];
			foreach ($data_province as $key => $value) {
				echo "<option value='".$value['province']."' id_province='".$value['province_id']."'>".$value['province']."</option>";
			}
		}
	}

	public function city()
	{
		$id_selected= $this->input->post('id_province');
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=". $id_selected,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
  // echo $response;
			$array_response = json_decode($response, true);
			$data_city = $array_response['rajaongkir']['results'];
			foreach ($data_city as $key => $value) {
				echo "<option value='".$value['city_name']."' id_city='".$value['city_id']."'>".$value['city_name']."</option>";
			}
		}
	}

	public function expedisi()
	{
		echo "<option></option>";
		echo "<option value='jne'>JNE</option>";
		echo "<option value='tiki'>TIKI</option>";
		echo "<option value='pos'>POS</option>";
	}

	public function package()
	{
$expedisi = $this->input->post('expedisi');
$id_city = $this->input->post('id_city');
$weight = $this->input->post('weight');
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=23&destination=".$id_city."&weight=".$weight."&courier=".$expedisi,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response, true);
  $data_package = $array_response['rajaongkir']['results'][0]['costs'];
  echo "<option value=''>Pilih Paket</option>";
  foreach ($data_package as $key => $value) {
  	echo "<option value='".$value['service']."' ongkir='".$value['cost'][0]['value']."'>";
  	echo $value['service'] ." | ".$value['cost'][0]['value']."|".$value['cost'][0]['etd']."hari";
  	echo "</option>";
  }
}
	}
}