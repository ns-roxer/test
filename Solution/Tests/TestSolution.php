<?php

namespace Solution\Tests;

use Solution\Solution;

require __DIR__.'/../Solution.php';

/**
 * {@inheritDoc}
 */
class TestSolution extends \PHPUnit_Framework_TestCase
{
    /** @var  Solution */
    protected $solution;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->solution = new Solution();
    }

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
        static::assertEquals($expected, $this->solution->nesting($input));
    }

}
