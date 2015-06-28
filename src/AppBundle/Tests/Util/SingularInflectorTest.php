<?php

use AppBundle\Util\SingularInflector;

class SingularInflectorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testSingularInflectorTakesPluralValueAndMakesItSingular($plural, $singular)
    {
        $inflector = new SingularInflector();
        $this->assertEquals($singular, $inflector->pluralize($plural));
    }

    public function provider()
    {
        return [
            ['ross', 'ross'],
            ['doritos', 'dorito'],
            ['proxies', 'proxy'],
            ['foxes', 'fox'],
            ['potatoes', 'potato'],
            ['knives', 'knife'],
            ['dogs', 'dog']
        ];
    }
}