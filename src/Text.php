<?php

namespace ViewHelpers;

class Text
{
    /**
     * Join a list of elements.
     * For example the array ['one', 'two', 'three'] is converted to 'one, two and three'
     *
     * @param array $pieces
     * @param string $glue
     * @param string $lastGlue
     *
     * @return string
     */
    public static function join(array $pieces, $glue = ', ', $lastGlue = ' and ')
    {
        $last = array_pop($pieces);

        if (empty($pieces)) {
            return (string) $last;
        }

        return implode($glue, $pieces).$lastGlue.$last;
    }
}
