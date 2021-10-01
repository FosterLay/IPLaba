<?php
    $xml = simplexml_load_file("https://rss.nytimes.com/services/xml/rss/nyt/Travel.xml");

    $loaded = $_GET['loaded'];
    $need_to_load = $_GET['need_to_load'];

    $start = intval($loaded);
    $steps = intval($need_to_load);
    $end = $start + $steps;

    for ($i=$start; $i<$end; $i++) {
        $entry = $xml->channel->item[$i];
        if ($entry==null){
            continue;
        }
        if ($media = $entry->children('media', TRUE)){
            $attributes = $media->content->attributes();

            $title = $entry->title;
            $link = $entry->link;
            $description = $entry->description;
            $url = (string)$attributes['url'];

            echo "<section>";
            echo "<h2 style='background-color:lightblue;'>" . $title . "</h2>";
            echo "<a href='open_comments.php?id=$i'>
                <img class='leftimg' style='width:340px;height:340px;' src='$url' onclick=\"window.location.href='open_comments.php?id=$i'\"> </a>";
            echo "<p style='font-size:20px'>$description</p>";
            echo "<div style='clear:left'></div>";

            echo "</section>";

        }
    }
?>