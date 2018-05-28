<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 06.03.2018
 * Time: 20:46
 */

namespace BotbLib\Languniq;


abstract class BaseIntent
{
    protected $cdb;

    function __construct()
    {
        global $db;
        $this->cdb = $db;
    }
}