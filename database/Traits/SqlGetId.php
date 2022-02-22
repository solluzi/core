<?php
declare(strict_types=1);
namespace Solluzi\Database\Traits;

/**
 * SqlGetId
 *  returns inserted id in table
 */
trait SqlGetId
{
    /*
    |----------------------------------------------------------------------------------------------
    | getId method
    |----------------------------------------------------------------------------------------------
    |
    | gets the id inserted in database
    |
    */
    public function getId()
    {
        /*
        |----------------------------------------------------------------------------------------------
        | id
        |----------------------------------------------------------------------------------------------
        |
        | returns the id
        |
        */
        return $this->id;
    }
}
