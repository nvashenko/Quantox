<?php
namespace App\StudentBoard;


abstract class AbstractStudentBoardHandler
{

    public $format = 'json';

    /**
     * get board output format
     * @return string
     */
    public function getFormat(){
        return $this->format;
    }

    /**
     * Get average
     * @param $grades
     * @return float|int
     */
    public function getGradesAvg($grades)
    {
        $count = count($grades);
        if($count){
            return array_sum($grades) / count($grades);
        }
        else{
            return 0;
        }
    }
}