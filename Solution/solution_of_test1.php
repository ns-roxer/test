<?php

namespace Solution;


function nesting(array $ar)
{
    return array_reduce(
        $ar,
        function ($accumulator, $current) {
            return [$current => $accumulator];
        }
    );
}