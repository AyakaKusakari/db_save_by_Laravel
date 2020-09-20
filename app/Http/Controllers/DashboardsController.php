<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquirer;
use App\Check;

class DashboardsController extends Controller
{
    public function index()
    {
        // チェックボックスの内容の定数を取得
        $check_items = config('const.check_item');

        // ２つのテーブルの内容をすべて取得
        $inquiries = Inquirer::get();
        $checks    = Check::get();

        return view('dashboard', [
            'check_items' => $check_items,
            'inquiries'   => $inquiries,
            'checks'      => $checks,
        ]);
    }
}
