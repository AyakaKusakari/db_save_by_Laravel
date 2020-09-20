<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquirer;
use App\Check;
use DB;

class InquiriesController extends Controller
{
    public function index()
    {
        $check_items = config('const.check_item');

        return view('inquiries.index', [
            'check_items' => $check_items,
        ]);
    }

    public function process(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'check_item' => 'required',
        ]);

        $input = $request->except('submit');

        try {
            DB::beginTransaction();

            // inquirersテーブルにデータを格納
            $inquiry = new Inquirer();
            $inquiry->fill($input);
            $inquiry->save();

            // inquirersのidを $inquiryId とする
            $inquiryId = $inquiry->id;

            // 登録されたチェックボックスの内容を配列で所持
            $inquiryData = $request->get('check_item');

            // checksテーブルにデータを格納
            foreach ($inquiryData as $inquiry) {
                $entryCheck = New Check();
                $entryCheck->inquirers_id = $inquiryId;
                $entryCheck->check_item   = $inquiry;
                $entryCheck->save();
            }

            DB::commit();

            return redirect()->route('complete');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('inquiry')->withInput($input)->with('flash_message', 'エラーが発生しました。');
        }
    }

    public function complete()
    {
        return view('inquiries.complete');
    }
}
