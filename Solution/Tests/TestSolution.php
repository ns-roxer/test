<?php

namespace Solution\Tests;

use Solution\Solution;

require __DIR__.'/../Solution.php';

/**
 * {@inheritdoc}
 */
class TestSolution extends \PHPUnit_Framework_TestCase
{
    /** @var Solution */
    protected $solution;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->solution = new Solution();
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

    /**
     * @dataProvider nestingWithValuesDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testNestingWithValues($input, $expected)
    {
        static::assertEquals($expected, $this->solution->nestingWithValues($input));
    }

    /**
     * @dataProvider flattenDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testFlatten($input, $expected)
    {
        static::assertEquals($expected, $this->solution->flatten($input));
    }

    public function nestingWithValuesDataProvider()
    {
        return [
            [
                [
                    'parent.child.field' => 1,
                    'parent.child.field2' => 2,
                    'parent2.child.name' => 'test',
                    'parent2.child2.name' => 'test',
                    'parent2.child2.position' => 10,
                    'parent3.child3.position' => 10,
                ],
                [
                    'parent' => [
                        'child' => [
                            'field' => 1,
                            'field2' => 2,
                        ],
                    ],
                    'parent2' => [
                        'child' => [
                            'name' => 'test',
                        ],
                        'child2' => [
                            'name' => 'test',
                            'position' => 10,
                        ],
                    ],
                    'parent3' => [
                        'child3' => [
                            'position' => 10,
                        ],
                    ],
                ],
            ],
        ];
    }

    public function flattenDataProvider()
    {
        return [
            [
                [
                    'parent' => [
                        'child' => [
                            'field' => 1,
                            'field2' => 2,
                        ],
                    ],
                    'parent2' => [
                        'child' => [
                            'name' => 'test',
                        ],
                        'child2' => [
                            'name' => 'test',
                            'position' => 10,
                        ],
                    ],
                    'parent3' => [
                        'child3' => [
                            'position' => 10,
                        ],
                    ],
                ],
                [
                    'parent.child.field' => 1,
                    'parent.child.field2' => 2,
                    'parent2.child.name' => 'test',
                    'parent2.child2.name' => 'test',
                    'parent2.child2.position' => 10,
                    'parent3.child3.position' => 10,
                ],
            ],
        ];
    }

    public function nestingDataProvider()
    {
        return [
            [
                ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'],
                ['h' => ['g' => ['f' => ['e' => ['d' => ['c' => ['b' => ['a' => null]]]]]]]],
            ],
            [
                ['abc', 'def', 'ghi', 'ghi'],
                ['ghi' => ['ghi' => ['def' => ['abc' => null]]]],
            ],
            [
                [],
                null,
            ],
        ];
    }
}
