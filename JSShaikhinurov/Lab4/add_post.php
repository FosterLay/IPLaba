<?php
    $author = $_GET['author'];
    $image = $_GET['image'];

    $xmldoc = new DOMDocument();
    $xmldoc->load('posts.xml');

    $storage = $xmldoc->getElementsByTagName("storage")->item(0);

    $element = $xmldoc->createElement("post");
    $element->setAttribute('author', $author);
    $element->setAttribute('image', $image);
    $storage->appendChild($element);

    $xmldoc->save('posts.xml');
?>