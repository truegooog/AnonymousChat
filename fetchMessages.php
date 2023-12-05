<?php
$chatFile = "chatlog.txt";
if (file_exists($chatFile)) {
    $messages = file_get_contents($chatFile);
    echo nl2br($messages);
} else {
    echo "No messages yet.";
}
?>
