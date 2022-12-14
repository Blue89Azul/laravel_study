<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** 
         * 前に処理を挟む 
         * ・メンテナンスモードの時は処理をリダイレクト
         * ・ログインしているユーザーのみに処理を制限する
         * ・特定のIPアドレスからのみアクセスを制限する
         * ・ユーザーからリクエストされたデータを一律で変換する
         */
        return $next($request);
        /** 後に処理を挟む 
         * ・全てのHTTPレスポンスに特定のレスポンスヘッダーをつける
         * ・全てのHTTPレスポンスに付随するCookieを暗号化する
        */
    }
}
