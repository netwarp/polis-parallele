<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class ContactController extends Controller
{
    public function index()
    {
        $page = Page::where('label', 'contact')->first();

        return view('admin.contact.index', compact('page'));
    }

    public function post(Request $request)
    {
        $page = Page::where('label', 'contact')->first();

        if (is_null($page)) {
            return 'Page not exits -> php artisan db:seed';
        }

        $data = [
            'content' => $request->get('content')
        ];

        $page->update($data);

        return redirect()->action('Admin\ContactController@index')->with('success', 'Page edited');
    }
}
