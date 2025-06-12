<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageViewController extends Controller
{
    public function viewPage(User $user, Page $page)
    {
        $user->viewPage($page);

        return response()->json([
            'page' => $page->id,
            'user' => $user->id,
            'viewed' => 'Done'
        ]);
    }


    public function checkPage(User $user, Page $page)
    {
        return response()->json([
            'page' => $page->id,
            'user' => $user->id,
            'viewed' => $user->viewedPages->contains($page->id)
        ]);
    }

    public function viewList(User $user)
    {
        //  и надо может править, и 1000 вынести в константу...
        $pages = Page::withCount('viewers')
            ->having('viewers_count', '<', 1000)
            ->whereDoesntHave('viewers', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        return response()->json([
            'pages' => $pages,
        ]);
    }

    public function test()
    {
        return ['test' => 'Test message'];
    }
}
