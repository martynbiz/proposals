<?php

// extended helper functions for controllers and views

/**
 * Determin whether to show singular or plural form for a $value
 *
 * @param integer $value The single (1) or plural (!1) value
 * @param string $singular The singular form (e.g. "goose")
 * @param string $plural The plural form (e.g. geese)
 */
function plural($value, $singular, $plural)
{
    return  $value . ' ' . (($value == 1) ? $singular : $plural);
}