<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        if(isset($row['no_bp'])){
            if($row['email']!=''){
                $email = $row['email'];
            }else{
                $email = $row['no_bp'].'@mail.com';
            }
            $user = User::updateOrCreate([
                'id' => $row['no_bp']],[
                'name' =>$row['nama_lengkap'],
                'email' => $row['email'] ? $row['email'] : $row['no_bp'].'@mail.com',
                'type' => 3,
                'username' => $row['no_bp'],
                'password' => bcrypt($row['no_bp'])
            ]);
        }else{
            $user = new User([
                'id' => $row['nip'],
                'username' => $row['nip'],
                'email' => $row['nip'].'@mail.com',
                'type' => 2,
                'name' => $row['nama'],
                'password' => bcrypt($row['nip'])
            ]);
        }
        return $user;
    }
}
