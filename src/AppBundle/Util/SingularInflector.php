<?php

namespace AppBundle\Util;

use FOS\RestBundle\Util\Inflector\InflectorInterface;

/**
 * Singular inflector doesn't pluralize anything
 */
class SingularInflector implements InflectorInterface
{
    /**
     * @param  string $word
     * @return string
     */
    public function pluralize($word)
    {
        $rules = [
            'ss' => 'ss',
            'os' => 'o',
            'ies' => 'y',
            'xes' => 'x',
            'oes' => 'o',
            'ves' => 'fe',
            's' => ''
        ];
        foreach (array_keys($rules) as $key) {
            if (substr($word, (strlen($key) * -1)) != $key) {
                continue;
            }
            if ($key === false) {
                return $word;
            }
            return substr($word, 0, strlen($word) - strlen($key)) . $rules[$key];
        }
        return $word;
        
    }
}