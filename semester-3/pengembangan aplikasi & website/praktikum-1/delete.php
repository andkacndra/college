<?php
$file = 'data.json';
if(isset($_GET['nim'])){
  $nim = $_GET['nim'];
  $data = json_decode(file_get_contents($file), true);
  foreach($data as $key => $mhs){
    if($mhs['nim'] == $nim){
      unset($data[$key]);
      break;
    }
  }
  file_put_contents($file, json_encode(array_values($data), JSON_PRETTY_PRINT));
}
header("Location: form.php");
exit;
?>