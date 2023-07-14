<?php

namespace App\Imports;

use App\Models\StudentMarks;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportStudentMarksheet implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentMarks([
            'english' => $row['english'],
            'maths' => $row['maths'],
            'science' => $row['science'],
            'hindi' => $row['hindi'],
            'computer' => $row['computer']
        ]);
    }
}
