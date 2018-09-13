<?php

namespace App\Service;

Class SpamChecker
{

    const WORDS = [
        'spam',
        'special offer',
        'mortgage',
    ];

    /**
     * Checks if a text is a spam using a dictionary
     * @param string $text Text to check
     * @return bool True if the text is a spam
     */
    public function isSpam(string $text) :bool
    {
        foreach(self::WORDS as $word){
            if(strpos($text, $word) !== false){
                return true;
            }
        }
        return false;
    }

}