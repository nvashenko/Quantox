<?php
namespace App\StudentBoard;

use App\Student;
use Spatie\ArrayToXml\ArrayToXml;

class CSMBStudentBoardHandler extends AbstractStudentBoardHandler
{
    const PASS_THRESHOLD = 8;
    const DISCARD_THRESHOLD = 2;

    public $format = 'xml';

    /**
     * Handle CSMB student board
     * @param Student $student
     * @return string
     */
    public function handle(Student $student){
        $studentGrades = array_column($student->grades->all(), 'grade');
        asort($studentGrades);
        if(count($studentGrades) > self::DISCARD_THRESHOLD){
            array_shift($studentGrades);
        }
        $avg = $this->getGradesAvg($studentGrades);
        $passed = end($studentGrades) >= self::PASS_THRESHOLD;
        $result = [
          'student id' => $student['student_id'],
          'name' => $student['name'],
          'list of grades' => $studentGrades,
          'average' => $avg,
          'final result' => $passed ? 'Pass' : 'Fail',
        ];
        return ArrayToXml::convert($result);
    }
}