<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Code
 * 
 * Use base to Code ID's. Downloaded from SO
 * 
 * @link http://stackoverflow.com/questions/4964197/converting-a-number-base-10-to-base-62-a-za-z0-9
 */
class Code
{

    private $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private $base_xx = 62;

    /**
     * Code int to Base string.
     * 
     * @param int
     * @param int
     * @return string
     */
    function toBase($num)
    {
        $b = $this->base_xx;
        $base = $this->base;
        $r = $num % $b;
        $res = $base[$r];
        $q = floor($num / $b);
        while ($q) {
            $r = $q % $b;
            $q = floor($q / $b);
            $res = $base[$r] . $res;
        }
        return $res;
    }

    /**
     * Decode base string into int
     * 
     * @param string
     * @param int
     * @return int
     */
    function to10($num)
    {
        $b = $this->base_xx;
        $base = $this->base;
        $limit = strlen($num);
        $res = strpos($base, $num[0]);
        for ($i = 1; $i < $limit; $i++) {
            $res = $b * $res + strpos($base, $num[$i]);
        }
        return $res;
    }

}
