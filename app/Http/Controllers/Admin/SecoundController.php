<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class SecoundController extends Controller implements HasMiddleware
{
   public static function middleware(): array
    {
        return [
            // على الكل
            // 'auth',
            // تطبق فقط علىshowString2
                // new Middleware('auth', only: ['showString2']),
            //تطبق auth على جميع الدوال ماعدا showString2
            new Middleware('auth', except: ['showString2']),
        ];
    }
   public function showString0(){
    return 'static String';
   }
   public function showString1(){
    return 'static String';
   }
   public function showString2(){
    return 'static String';
   }
   public function showString3(){
    return 'static String';
   }
}
