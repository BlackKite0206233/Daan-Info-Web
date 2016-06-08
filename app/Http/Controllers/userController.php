<?php
//登入、登出
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Services\loginServices;

class userController extends Controller
{
    protected $loginServices;

    public function __construct(loginServices $loginServices)
    {
        $this->loginServices = $loginServices;
    }

    //登入 頁面
    public function index()                                                                           //get /login
    {

        return view('login');
    }

    //登入驗證
    public function store(Request $request)                                                           //post /login
    {
        //驗證
        $login = $this->loginServices
                      ->login($request['ID'],$request['password']);

        session(['status'=>$login['status']]);//設定狀態
        session(['memID'=>$login['memID']]);//使用者的帳號(用來取得專題編號)

        if($login['status'] == 'guest')//登入失敗
            return redirect('/login');//回到登入畫面
        else if($login['status'] == 'student')//學生登入
        {

            if($login['groupno'] == NULL)//第一次登入
                return redirect('/topic/create');//導向到新增專題頁面
            return redirect('/topic/showTopic');//導向到使用者的專題頁面
        }
        else//老師登入(後台還沒寫)
            return redirect('/');
    }

    //登出
    public function logout()                                                                          //get /logout
    {
        //登出
        $logout = $this->loginServices
                       ->logout();

        //設定狀態
        session(['status'=>$logout]);

        return redirect('/')->with('logout',true);//重導到首頁
    }

}
