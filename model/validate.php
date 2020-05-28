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

     function validName($name)
    {
        return !ctype_alpha($name);
    }
    function validAge($age)
    {
        if($age>17 && $age<119){
            return true;
        }
        return false;
    }
     function validPhone($phone)
    {
        return ctype_alnum($phone)&&strlen($phone)<=9;
    }
      function validEmail($email)
    {
        if(strpos($email,"@")==false){
            return true;
        }
        return false;
    }

     function validOutdoor($outdoor)
    {
        foreach ($outdoor as $out){
            if(!in_array($out,getOutdoor())){
                return false;
            }
        }
        return true;
    }

     function validIndoor($indoor)
    {
        foreach ($indoor as $in){
            if(!in_array($in,getIndoor())){
                return false;
            }
        }
        return true;
    }


}