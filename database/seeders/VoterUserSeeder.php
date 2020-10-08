<?php

namespace Database\Seeders;

use App\Models\Voters;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VoterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=4; $i++) {
            $voters = new Voters();
            $voters->nis = Str::random(10);
            $voters->name = "Voter"."$i";
            $voters->gender = "L";
            $voters->email = "voter".$i."@gmail.com";
            $voters->kelas = "12";
            $voters->jurusan = "Ips "."$i";
            $voters->level = "Siswa";
            $voters->vote_id = 1;
            $voters->save();
        }

        for($i=1; $i<=4; $i++) {
            $voters = new Voters();
            $voters->nip = Str::random(12);
            $voters->name = "VoterUser"."$i";
            $voters->gender = "P";
            $voters->email = "voterUser".$i."@gmail.com";
            $voters->profesi = "Guru "."$i";
            $voters->level = "Guru";
            $voters->vote_id = 2;
            $voters->save();
        }
    }
}
