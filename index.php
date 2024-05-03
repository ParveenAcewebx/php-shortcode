<html>
    <head>
        <title>Shortcode Example</title>
    </head>
    <body>
        <?php
            // Render shortcodes within the content 
            $content = "Functionality of [foo] via [bar name='John']";
            echo do_shortcode($content);
            
            echo "<br><br>";

            // Render a specific shortcode  
            echo do_shortcode("[foo]"); 
        ?>
    </body>
</html>