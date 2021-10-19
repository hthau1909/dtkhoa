<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('genres')->insert([
        [
            'name_genre' => 'Hành động',
            'slug_genre' => 'hanh-dong',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_genre' => 'Hoạt Hình',
            'slug_genre' => 'hoat-hinh',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_genre' => 'Kinh Dị',
            'slug_genre' => 'kinh-di',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_genre' => 'Hài Hước',
            'slug_genre' => 'hai-huoc',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_genre' => 'Tâm Lý',
            'slug_genre' => 'tam-ly',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_genre' => 'Tình Cảm',
            'slug_genre' => 'tinh-cam',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
       DB::table('categories')->insert([
        [
            'name_category' => 'Phim Mới',
            'slug_category' => 'phim-moi',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_category' => 'Phim Bộ',
            'slug_category' => 'phim-bo',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_category' => 'Phim Lẻ',
            'slug_category' => 'phim-le',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_category' => 'Phim Chiếu Rạp',
            'slug_category' => 'phim-chieu-rap',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
       DB::table('nations')->insert([
        [
            'name_nation' => 'Mỹ',
            'slug_nation' => 'my',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_nation' => 'Việt Nam',
            'slug_nation' => 'viet-nam',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_nation' => 'Nhật Bản',
            'slug_nation' => 'nhat-ban',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_nation' => 'Trung Quốc',
            'slug_nation' => 'trung-quoc',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);


    }
}
