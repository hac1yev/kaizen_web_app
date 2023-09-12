<?php

    function customWordCount($text) {
        $words = preg_split('/\s+/', $text);
        return count($words);
    }

    function estimatedReadingTime($text, $averageWordsPerMinute) {
        $words = customWordCount($text);
        
        $readingTime = ceil($words / $averageWordsPerMinute);
        
        return $readingTime;
    }