<?php
namespace App\Helper;
use App\Daftar;
use Session;

class Helper
{
    public static function auth($email,$password)
    {
        $login = Daftar::where('email',$email)->where('password',$password)->first();
        if ($login != null){
            return $login;
        }else{
            Session::flush();
            return null;
        }
    }
}
?>