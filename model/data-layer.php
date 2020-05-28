<?php

    //data-layer.php

    /* getOutdoor()
     * Returns an array of outdoor activities
     * @return array
     */
    function getOutdoor()
    {
        $outdoor = array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing');
        return $outdoor;
    }

    /* getIndoor()
    * Returns an array of indoor activities
    * @return array
    */
    function getIndoor()
    {
        $indoor = array('tv', 'movies', 'cooking', 'board games', 'puzzles', 'reading', 'playing cards', 'video games');
        return $indoor;
    }

    function getStates()
    {
        $states = array('Alabama', 'Alaska', 'American Samoa', 'Arizona', 'Arkansas',
            'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia',
            'Federated States of Micronesia', 'Florida', 'Georgia', 'Guam', 'Hawaii',
            'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
            'Maine', 'Marshall Islands', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
            'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey',
            'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Northern Mariana Islands',
            'Ohio', 'Oklahoma', 'Oregon', 'Palau', 'Pennsylvania', 'Puerto Rico', 'Rhode Island',
            'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virgin Island',
            'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');
    return $states;
        }
