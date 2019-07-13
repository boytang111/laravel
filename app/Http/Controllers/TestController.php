<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
    //
    function index(){
        return view('Test', ['data' => 111]);
        DB::beginTransaction();

        try{  //中间逻辑代码
            $res = DB::table('user')->insertGetId(
                ['name' => 'tony', 'head_img' => 'aaaaaa']
            );
            DB::commit();
            return view('Test', ['data' => 2222]);
        }catch (\Exception $e) {//111
            //接收异常处理并回滚

            DB::rollBack();
            return view('Test', ['data' => 111]);
        }


                // var_dump($res);exit;



    }
}
