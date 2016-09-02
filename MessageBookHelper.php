<?php

/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 23:57
 */
class MessageBookHelper
{
    public static function magic($str)
    {
        $str = trim($str);
        if (!get_magic_quotes_gpc()) {
            $str = addslashes($str);
        }
        return htmlspecialchars($str);
    }

}