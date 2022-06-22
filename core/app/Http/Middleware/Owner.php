<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Session;
class Owner
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
        $result = DB::table('courses')->where('id',request()->operationID)->first();
        if($result == null or $result->user_id != auth()->user()->id){
            Session::flash('warning', 'Sorry, Record not found!.');
            return redirect()->route('instructor.course.intend');
        }
       
        return $next($request);
    }
}
