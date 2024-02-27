<?php
header("Access-Control-Allow-Origin: *");
header('content-type: application/json');
$id = $_GET["id"];
if($id == ""){
  echo json_encode(array(
"Admin" => "Lê Quangg Minhh Official",
"Youtube" => "https://www.youtube.com/@lequanggminhhofficial",
"Facebook" => "https://www.facebook.com/TrickerLQM",
"Zalo" => "https://zalo.me/lequangminhofficial",
"Type apis" => "Check Ngày Tạo Facebook & Khác",
"Example" => "{domail}/?id=&token= | Bỏ Trống Token, Là Sài Token Của Website",
"Status" => "Error",
"Messages" => "Vui Lòng Nhập UID Profile"), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); exit;
}
$token = 'EAAD6V7os0gcBO0vJV6CaiES78h97zOcY375bZAy1tpbDw4q0JUoDILpuKlsW9aYiPNEIGXCRkIZB8V2lG7QKrN8kwxseVkprs3AvkEXuGYZBxPXnihwYNKVXe7lzmkbRm08IaX0HIZBYzxc5LIjuS4e3RrdfrNO8yPbJ734HsalMUwxi1LLuc94ZD';
$get = CURL("https://graph.facebook.com/".$id."?fields=id,is_verified,cover,created_time,work,hometown,username,link,name,locale,location,about,website,birthday,gender,relationship_status,significant_other,quotes,first_name,subscribers.limit(0)&access_token=".$token);
$idtk = $get["id"];
$datecreate = $get["created_time"];
$user = $get["username"];
$link = $get["link"];
$name = $get["name"];
$locale = $get["locale"];
$website = $get["website"];
$birth = $get["birthday"];
$gender = $get["gender"];
$rela = $get["relationship_status"];
$sub = $get["subscribers"]["summary"]["total_count"];
$array = array(
        "Admin       " => "Lê Quangg Minhh Official",
        "Youtube     " => "https://www.youtube.com/@lequanggminhhofficial",
        "Facebook    " => "https://www.facebook.com/TrickerLQM",
        "Zalo        " => "https://zalo.me/lequangminhofficial",
        "type apis   " => "Check Ngày Tạo Facebook & Khác",
        "example     " => "{domail}/?id=&token= | Bỏ Trống Token, Là Sài Token Của Website",
        "status      " => "success",
        "data" => array(
        "idtk" => $idtk,
        "datecreate" => $datecreate,
        "user" => $user,
        "link" => $link,
        "name" => $name,
        "locale" => $locale,
        "website" => $website,
        "birthday" => $birth,
        "gender" => $gender,
        "relationship" => $rela,
        "subscribe" => $sub,
        #"" => $get
                    )
                    );
echo json_encode($array, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
function CURL($get){
  $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_ENCODING => '',
      CURLOPT_URL => $get,
      CURLOPT_RETURNTRANSFER => 1
    ));
  $access = json_decode(curl_exec($ch),true);
  return $access;
}