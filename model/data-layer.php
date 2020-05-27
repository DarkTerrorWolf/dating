<?php

    //data-layer.php

    /* getOutdoor()
     * Returns an array of outdoor activities
     * @return array
     */
    function getOutdoor()
    {
        $outdoor = array('hiking','biking','swimming','collecting','walking','climbing');
        return $outdoor;
    }

    /* getIndoor()
    * Returns an array of indoor activities
    * @return array
    */
    function getIndoor()
    {
        $indoor = array('tv','movies','cooking','board games','puzzles','reading','playing cards','video games');
        return $indoor;
    }