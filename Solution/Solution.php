<?php

namespace Solution;

class Solution
{
    public function nesting(array $ar)
    {
        return array_reduce(
            $ar,
            function ($accumulator, $current) {
                return [$current => $accumulator];
            }
        );
    }

    public function flatten(array $ar)
    {
        $result = [];

        $collapse = function ($path, array $ar, &$result) use (&$collapse) {
            foreach ($ar as $key => $value) {
                if (is_array($value)) {
                    $collapse($path.$key.".", $value, $result);
                    continue;
                }
                $result[$path.$key] = $value;
            }
        };
        $collapse("", $ar, $result);

        return $result;
    }

    public function nestingWithValues(array $ar)
    {
        $nested = [];
        foreach ($ar as $key => $value) {
            $depthLevels = $this->getDepthLevels($key);

            $maxDepth = count($depthLevels);
            $tmp = &$nested;

            foreach ($depthLevels as $depthLevel => $levelName) {
                if (!isset($tmp[$levelName])) {
                    if ($depthLevel === $maxDepth - 1) {
                        $tmp[$levelName] = $value;
                    } else {
                        $tmp[$levelName] = [];
                    }
                }
                $tmp = &$tmp[$levelName];
            }
        }

        return $nested;
    }

    protected function getDepthLevels($stringWithKeys)
    {
        return array_filter(explode('.', $stringWithKeys));
    }
}
