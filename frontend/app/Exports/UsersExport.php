<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection,  WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd(User::with('datacustomer')->where('role_id', 3)->get());
        return User::with('datacustomermarkom')->where('role_id', 3)->get();
    }
    public function map($users) : array {
        return [
            $users->name,
            $users->phone,
            $users->email,
            $users->datacustomermarkom->address,
            $users->datacustomermarkom->city,
            $users->datacustomermarkom->no_ktp,
            $users->datacustomermarkom->tgl_lahir,
        ] ;
 
 
    }
    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'E-mail',
            'Address',
            'City',
            'KTP Number',
        ];
    }
}
