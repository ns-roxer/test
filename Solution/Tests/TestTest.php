<?php

namespace Solution\Tests;

require __DIR__.'/../solution_of_test1.php';

use function Solution\nesting;

/**
 * {@inheritDoc}
 */
class TestTest extends \PHPUnit_Framework_TestCase
{

    public function nestingDataProvider()
    {
        return [
            [
                ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'],
                ['h' => ['g' => ['f' => ['e' => ['d' => ['c' => ['b' => ['a' => null,],],],],],],],],
            ],
            [
                ['abc', 'def', 'ghi', 'ghi'],
                ['ghi' => ['ghi' => ['def' => ['abc' => null,],],],],
            ],
            [
                [],
                null,
            ],
        ];
    }

    /**
     * @dataProvider nestingDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testNesting($input, $expected)
    {
        static::assertEquals($expected, nesting($input));
    }

}
