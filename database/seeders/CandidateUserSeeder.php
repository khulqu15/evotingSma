<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = new Candidate();
        $candidates->ketua = 'Syifa Azahra Irawan';
        $candidates->kelas_ketua = "Mipa 8 '19";
        $candidates->wakil = 'Attah Ullah';
        $candidates->kelas_wakil = "Ips 1 '20";
        $candidates->visi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, laboriosam inventore deleniti, maxime, dolorem placeat unde praesentium quos odio dolorum quisquam repudiandae incidunt asperiores iste consectetur veritatis tenetur ea temporibus esse omnis harum officiis. Voluptatum eligendi delectus autem illo. Iste!';
        $candidates->misi = '<ol class="pt-2 pb-5 pl-4"><li>Meningkatkan karakter siswa - siswi SMAN 1 Purwosari beriman serta taat kepada tuhan yang maha esa</li><li>Mengembangkan rasa kekeluargaan dalam nasionalisme</li><li>Meningkatkan kreatifitas siswa - siswi dalam berbahasa </li><li>Menumbuhkan rasa peduli lingkungan kepada siswa - siswi SMAN 1 Purwosari</li></ol>';
        $candidates->foto = 'vote1.png';
        $candidates->save();

        $candidates1 = new Candidate();
        $candidates1->ketua = 'Annisa Salma Nirmalasari';
        $candidates1->kelas_ketua = "Ips 1 '19";
        $candidates1->wakil = 'Catur Anugrah';
        $candidates1->kelas_wakil = "Mipa 6 '20";
        $candidates1->visi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, laboriosam inventore deleniti, maxime, dolorem placeat unde praesentium quos odio dolorum quisquam repudiandae incidunt asperiores iste consectetur veritatis tenetur ea temporibus esse omnis harum officiis. Voluptatum eligendi delectus autem illo. Iste!';
        $candidates1->misi = '<ol class="pt-2 pb-5 pl-4"><li>Meningkatkan karakter siswa - siswi SMAN 1 Purwosari beriman serta taat kepada tuhan yang maha esa</li><li>Mengembangkan rasa kekeluargaan dalam nasionalisme</li><li>Meningkatkan kreatifitas siswa - siswi dalam berbahasa </li><li>Menumbuhkan rasa peduli lingkungan kepada siswa - siswi SMAN 1 Purwosari</li></ol>';
        $candidates1->foto = 'vote2.png';
        $candidates1->save();
    }
}
