<?php

namespace Database\Seeders;

use App\Models\Specialist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr[] = ['name' => 'Khoa thần kinh',];
        $arr[] = ['name' => 'Khoa phẫu thuật chỉnh hình',];
        $arr[] = ['name' => 'Khoa ung bướu',];
        $arr[] = ['name' => 'Khoa nhi',];
        $arr[] = ['name' => 'Khoa tai mũi họng',];
        $arr[] = ['name' => 'Khoa mắt',];
        $arr[] = ['name' => 'Khoa ngoại tổng hợp',];
        $arr[] = ['name' => 'Khoa tim mạch',];
        $arr[] = ['name' => 'Khoa nội tiết',];
        $arr[] = ['name' => 'Khoa nội hô hấp',];
        $arr[] = ['name' => 'Khoa tiêu hóa',];
        $arr[] = ['name' => 'Khoa sản',];
        $arr[] = ['name' => 'Các chuyên khoa khác',];
        Specialist::insert($arr);
    }
}
