<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;//Eloquent(エロクアント)
use Illuminate\Support\Facades\DB;//クエリビルダ

class TestController extends Controller
{
    public function index()
    {
        //Eloquent(エロクアント)
        $values = Test::all();

        $count = Test::count();

        $first = Test::findOrFail(1);

        $whereBBB = Test::where('text', '=', 'bbb')->get();

        //クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get();

        dd($values, $count, $first, $whereBBB, $queryBuilder);

        //compactで$valuesの情報をviewに送る
        return view('tests.test', compact('values'));
    }
}
