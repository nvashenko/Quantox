<?php
namespace App\StudentBoard;

use App\Student;

class CSMStudentBoardHandler extends AbstractStudentBoardHandler {

    const PASS_THRESHOLD = 7;

    /**
     * Handle CSM student board
     * @param Student $student
     * @return string
     */
    public function handle(Student $student){
        $studentGrades = array_column($student->grades->all(), 'grade');
        $avg = $this->getGradesAvg($studentGrades);
        $passed = $avg && $avg >= self::PASS_THRESHOLD;
        $result = [
          'student id' => $student->id,
          'name' => $student->name,
          'list of grades' => $studentGrades,
          'average' => $avg,
          'final result' => $passed ? 'Pass' : 'Fail',
        ];
        return json_encode($result);
    }
}