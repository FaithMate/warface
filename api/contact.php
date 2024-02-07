<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  header("Method Not Allowed", true, 405);
  echo "GET method requests are not accepted for this resource";
  exit;
}

$TG_BOT_TOKEN = "";
$CHAT_ID = "";

$text = "";

foreach ($_POST as $key => $val) {
	$text .= $key . ": " . $val . "\n";
}

$text .= "\n" . $_SERVER["REMOTE_ADDR"];
$text .= "\n" . date("d.m.y H:i:s");

$param = [
	"chat_id" => $CHAT_ID,
	"text" => $text
];

$url = "https://api.telegram.org/bot" . $TG_BOT_TOKEN . "/sendMessage?" . http_build_query($param);

file_get_contents($url);

foreach($_FILES as $file) {
	$url = "https://api.telegram.org/bot" . $TG_BOT_TOKEN . "/sendDocument";

	move_uploaded_file($file["tmp_name"], $file["name"]);

	$document = new \CURLFile($file["name"]);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id" => $CHAT_ID, "document" => $document]);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: multipart/form-data"]);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

	$out = curl_exec($ch);

	curl_close($ch);

	unlink($file["name"]);
}

header("OK", true, 200);
die("1");
?>
