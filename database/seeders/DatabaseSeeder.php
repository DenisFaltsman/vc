<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory(20)->create();
        $pages = Page::factory(50)->create();

        // Randomly assign page views
        foreach ($users as $user) {
            // Each user views 3–7 random pages
            $viewedPages = $pages->random(rand(3, 7));
            foreach ($viewedPages as $page) {
                $user->viewedPages()->attach($page->id, [
                    'viewed_at' => now()->subDays(rand(0, 30)),
                ]);
            }
        }
    }
}
