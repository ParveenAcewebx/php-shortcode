<?php

// Define a function to render shortcodes
function do_shortcode($content) {
    
    // Define your list of shortcodes and their corresponding functions
    $shortcodes = array(
        'foo' => 'shortcodeFoo',
        'bar' => 'shortcodeBar',
    );
    
    // Regular expression to match shortcodes in the content
    $pattern = '/\[([a-zA-Z0-9_-]+)(.*?)\]/';
    
    // Callback function to replace shortcodes
    $callback = function($matches) use ($shortcodes) {
        $shortcode_name = $matches[1];
        $attributes = shortcodeParseAtts($matches[2]);
        
        // Check if the shortcode exists
        if (array_key_exists($shortcode_name, $shortcodes)) {
            return call_user_func($shortcodes[$shortcode_name], $attributes);
        }
        return $matches[0];
    };

    // Replace shortcodes in the content using regular expression
    $processed_content = preg_replace_callback($pattern, $callback, $content);
    return $processed_content;
}

// Function to parse shortcode attributes
function shortcodeParseAtts($text) {
    $atts = array();
    $pattern = '/(\w+)\s*=\s*([\"\'])(.*?)\2/';
    preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
        $atts[$match[1]] = $match[3];
    }
    return $atts;
}

// Function to handle the 'Foo' shortcode
function shortcodeFoo($attributes) {
    return "Shortcodes";
}

// Function to handle the 'Bar' shortcode
function shortcodeBar($attributes) {
    $name = isset($attributes['name']) ? $attributes['name'] : 'Guest';
    return $name;
}