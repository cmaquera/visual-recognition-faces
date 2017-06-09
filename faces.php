<?php

function miniAPIPost($foto){
  $url ="https://gateway-a.watsonplatform.net/visual-recognition/api/v3/detect_faces?api_key=f28a7547bdfcfc8b210492aa578218f6ed2039c6&version=2016-05-17";
    
  $tmpfile = $foto['tmp_name'];
  $filename = basename($foto['name']);
  $parametros ="parametros.json";
  
  $data = array(
	'images_file' => '@'.$tmpfile.';filename='.$filename,
	'classifier_ids' => '["Personas_2036167924", "default", "face_detection", "detect_faces"]',
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


if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
    $asd = miniAPIPost($_FILES["file"]);
    $resultado = $asd['images'][0]['faces'];
    for($i=0; $i < count($resultado); $i++){
    //detect faces
    }

    echo json_encode($resultado);
}

?>