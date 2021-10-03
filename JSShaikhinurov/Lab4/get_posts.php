<?php
    $xmldoc = new DOMDocument();
    $xmldoc->load('posts.xml');

    $storage = $xmldoc->getElementsByTagName("storage")->item(0);

    foreach($storage->getElementsByTagName("post") as $item){
        echo "<p><section style='background-color:rgb(192, 227, 255); font-size:22px; padding:10px 10px'>";
        echo "<p> Автор: " .$item->attributes[0]->nodeValue. "</p>";
        echo "<img src='" .$item->attributes[1]->nodeValue. "' width=200px height=200px>";
        echo "</section></p>";
    }
?>