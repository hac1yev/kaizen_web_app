<?php

    function custom_word_count($text) {
        $words = preg_split('/\s+/', $text);
        return count($words);
    }