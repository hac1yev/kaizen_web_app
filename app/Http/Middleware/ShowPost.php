<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Posts;
use Illuminate\Http\Request;

class ShowPost
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
        $postID = $request->route('id');
        if ($post = Posts::find($postID))
        {
            if ($post->status)
            {
                return $next($request);
            }
        }
        return abort(404);
    }
}
