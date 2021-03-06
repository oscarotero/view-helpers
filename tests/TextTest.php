<?php

namespace ViewHelpers\Tests;

use PHPUnit\Framework\TestCase;
use ViewHelpers\Text;

class TextTest extends TestCase
{
    public function joinDataProvider()
    {
        return [
            [
                [],
                ''
            ],[
                ['one'],
                'one',
            ],[
                ['one', 'two'],
                'one and two',
            ],[
                ['one', 'two', 'three'],
                'one, two and three',
            ],[
                ['one', 'two', 'three', 'four'],
                'one, two, three and four',
            ],
        ];
    }

    /**
     * @dataProvider joinDataProvider
     */
    public function testJoin($array, $expected)
    {
        $this->assertSame($expected, Text::join($array));
    }
}
