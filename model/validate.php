<?php


//Validate.php

/**
 * Class Validate
 * Contains validation methods for app
 * @author Tylor Schlosser
 * @version 0.1
 */
class Validate
{
    /* Return a value indicating if food parameter is valid
       Valid foods are not empty and do not contain anything except letters
       @param String $food
       @return boolean
    */
    function ValidName($name)
    {
        return ctype_alpha($name);
    }
    function validAge($age)
    {
        return $age>=18&&$age<=118;
    }
    function validPhone($phone)
    {
        return ctype_alnum($phone)&&strlen($phone)<=9;
    }
    function validEmail($email)
    {
        if(strpos($email,"@")&&strpos($email,'.')){
         return true;
        }
        return false;
    }
    function validOutdoor($outdoor)
    {
        return in_array($outdoor,getOutdoor());
    }
    function validIndoor($indoor)
    {
        return in_array($indoor,getIndoor());
    }


}