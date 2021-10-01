<html>
    <title>Комментарии</title>
    <head>
        <meta charset = "UTF-8">
    </head>
    
    <body style='width:50%;margin-left:25%'>
    <h1>КОММЕНТАРИИ</h1>
        <?php
            $id = $_GET['id'];

            echo "<section  id='comments_$id'>";

            $xmldoc = new DOMDocument();
            $xmldoc->load('comments.xml');

            $storage = $xmldoc->getElementsByTagName("storage")->item(0);

            foreach($storage->getElementsByTagName("comments") as $section){
                if ($section->attributes['id']->nodeValue==$id){
                    $needed_section = $section;
                    break;
                }
            }

            if ($needed_section==null){
                $element = $xmldoc->createElement('comments');
                $element->setAttribute('id', $id);
                $needed_section = $storage->appendChild($element);
                $xmldoc->save('comments.xml');
            }

            foreach($needed_section->getElementsByTagName("comment") as $item){
                echo "<section style='font-size:24px'>";
                echo " - ". $item->nodeValue;
                echo "</section>";
            }

            echo "</section>";

            echo "<p>";

            echo "<input style='background-color: lightgray;color: white; border: none; padding: 15px 32px; font-size: 16px;' id='new_comment_$id' type='text'>
            <input style='
                background-color: black;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;'
                type='button' value='Добавить комментарии' onclick='add_comment($id)'>";

            echo "</p>";
        ?>

        <script language="JavaScript" src="../jquery.js"></script>
        <script language="JavaScript">
            function add_comment(news_id){
                // Поле с комментарием
                var comment_input = document.getElementById("new_comment_"+news_id);
                // Текст комментария
                var comment = comment_input.value;
                // Очистка поля
                comment_input.value = "";

                // Запрос
                $.ajax({
                    type: "GET",
                    url: "add_comment.php?id="+news_id+"&text="+comment,
                    dataType: "html",
                    success: function(data){
                        var comment_section_id = "comments_"+news_id;
                        var comment_section = document.getElementById(comment_section_id);
                        comment_section.innerHTML += "<section style='font-size:24px'>" + " - " + comment + "</section>";
                    }
                });
            }
        </script>
    </body>
</html>