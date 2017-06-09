<?php

function miniAPIPost($foto){
  $url ="https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key=f28a7547bdfcfc8b210492aa578218f6ed2039c6&version=2016-05-20";
  
  $img = $_POST['imgBase64'];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $fileData = base64_decode($img);
  
  //saving
  $fileName = $_POST['nameImg'] . '.png';
  file_put_contents('./uploads/'.$fileName, $fileData);
    
  $data = array(
	'images_file' => '@'.'./uploads/'.$fileName,
	'classifier_ids' => '["Personas_2036167924", "default"]',
  ); 

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data );
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
  curl_close($ch); 
  
  return json_decode($result, true);
}

$asd = miniAPIPost($_FILES["foto"]);
$resultado = $asd['images'][0]['classifiers'][0]['classes'][0];

$file_name = array(
    "file" => $_POST['nameImg'],
);

array_push($resultado, $file_name);

//unlink($);

echo json_encode($resultado);

?>