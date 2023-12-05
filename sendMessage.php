<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["message"])) {
    $message = $_POST["message"];
    $message = convertToClickableLinks($message); // Convert links in the message
    $chatFile = "chatlog.txt";
    $fp = fopen($chatFile, "a");
    fwrite($fp, $message . PHP_EOL);
    fclose($fp);
    http_response_code(200);
} else {
    http_response_code(400);
}

function convertToClickableLinks($text) {
    // Convert URLs to clickable links with proper formatting
    $text = preg_replace('/(http[s]?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $text);
    return $text;
}
?>
