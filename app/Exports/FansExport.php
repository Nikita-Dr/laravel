<?php

namespace App\Exports;

//use App\Models\User;
use App\Models\fan;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return fan::all();
    }
}