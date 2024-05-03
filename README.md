# PHP Shortcode

Overview:
This functionality provide the powerful way to process shortcodes. Means you can make a section dynamic using shortcode within content.

It also allow users to render specific shortcode too.
<br />
<br />

## Features

It is flexible code to use shortcode in string contents.You can simply save the code in php files and also you can edit as per requirements.
<br />
<br />

## Uses of ```do_shortcode()``` 

ref : ```functions.php```
```php
    $content = "Functionality of [foo] via [bar name='John']";
    echo do_shortcode($content);
``` 
Output : *Functionality of Shortcodes via John*
<br />
<br />

```php
    echo do_shortcode("[foo]");
``` 
Output : *Shortcodes*