<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Replies')->insert([
            [
                'message' => 'ここに返信を書く',
                'trouble_post_id' => 1,
                'created_at' => NOW()
            ],
            [
                'message' => 'すぐに用意いたします',
                'trouble_post_id' => '5',
                'created_at' => NOW()
            ],
            [
                'message' => 'それは私達の仕事ではなく、清掃業者にご連絡ください',
                'trouble_post_id' => '3',
                'created_at' => NOW()
            ],
        ]);
    }
}
