<?php namespace App\Library;

/**
 * Utility methods
 */

class Utils
{
    /**
     * Calculates the ratio percentage between 2 given arguments
     * @param integer $a First argument (e.g. yes votes)
     * @param integer $a Second argument (e.g. no votes)
     */
    public function calculateShare($a, $b)
    {
        // 
        $ratios = array(0, 0);
        if ($a > 0) {
            if ($b > 0) {
                $ratios[0] = floor(($a / ($a + $b)) * 100);
                $ratios[1] = 100 - $ratios[0];
            } else {
                $ratios[0] = 100;
            }
        } else { // a == 0 
            if ($b > 0) {
                $ratios[1] = 100;
            }
        }
        
        return $ratios;
    }
    
}