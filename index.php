<?php

    date_default_timezone_set('Asia/Manila');

    function diffForHumans(DateTime $date) {

        $currentDate = new DateTime;

        $difference = $currentDate->diff($date);
        
        $unit = 'second';
        $count = '';
        
        switch (true) {
            case $difference->y > 0:
                $unit = 'year';
                $count = $difference->y;
                break;
            case $difference->m > 0:
                $unit = 'month';
                $count = $difference->m;
                break;
            case $difference->d > 0:
                $unit = 'day';
                $count = $difference->d;
                break;
            case $difference->h > 0:
                $unit = 'hour';
                $count = $difference->h;
                break;
            case $difference->i > 0:
                $unit = 'minute';
                $count = $difference->i;
                break;
            case $difference->s > 0:
                $unit = 'second';
                $count = $difference->s;
                break;
        }

        if ($count === 0) {
            $count = 1;
        }

        if ($count !== 1) {
            $unit .= 's';
        }
        
        $inversion = $difference->invert === 0 ? 'from now' : 'ago';
       
        return "{$count} {$unit} {$inversion}";
        
    }

    $date = new DateTime('2019-02-09 11:13:26 pm');
 
    echo diffForHumans($date);