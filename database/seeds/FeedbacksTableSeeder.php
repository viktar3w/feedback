<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [];
        for ($i=0;$i<10;$i++) {
            $feedbacks[] = [
                'name' => "Test{$i}",
                'email' => "test{$i}@gmail.com",
                'phone' => "+12312312{$i}",
                'text' => "test test test",
            ];
        }
        \DB::table('feedbacks')->insert($feedbacks);
    }
}
