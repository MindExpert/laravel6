<?php

use App\User;
use App\Conversation;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\Conversation::class, 8)->create();
        factory(App\Reply::class, 20)->create();
    }
}
