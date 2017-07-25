<?php

namespace ViewHelpers\Tests;

use PHPUnit\Framework\TestCase;
use ViewHelpers\Html;

class HtmlTest extends TestCase
{
    public function testElement()
    {
        $this->assertSame(
            '<div class="hello">',
            Html::element('div', ['class' => 'hello'])
        );
    }

    public function testAttrClass()
    {
        $this->assertSame(
            '<div class="hello world">',
            Html::element('div', ['class' => ['hello', '', 'world']])
        );
    }

    public function testAttrSrcset()
    {
        $this->assertSame(
            '<img srcset="image.png 1x, image@2.png 2x">',
            Html::element('img', ['srcset' => [
                '0x' => '',
                '1x' => 'image.png',
                '2x' => 'image@2.png',
            ]])
        );
    }

    public function testAttrStyle()
    {
        $this->assertSame(
            '<div style="color: blue; font-size: 2em; margin: 0">',
            Html::element('div', ['style' => [
                'background-color' => '',
                'color' => 'blue',
                'font-size' => '2em',
                'margin' => '0',
            ]])
        );
    }
}
