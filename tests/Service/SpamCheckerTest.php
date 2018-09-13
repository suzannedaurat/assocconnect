<?php

namespace App\Tests\Service;

use App\Service\SpamChecker;
use PHPUnit\Framework\TestCase;

Class SpamCheckerTest extends TestCase
{

    /**
     * @dataProvider providerIsSpam
     */
    public function testIsSpam(string $text, bool $isSpam)
    {
        $spamChecker = new SpamChecker();
        $this->assertSame($isSpam, $spamChecker->isSpam($text));
    }
    public function providerIsSpam()
    {
        return [
            ['Hello world!', false],
            ['Low rate for mortgage', true],
        ];
    }

}