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
        $post = $request->route('post');
        
        // dd($post->getUser);

        if ($post->status)
        {
            return $next($request);
        }

        if (!$post->status)
        {
            if (auth()->check())
            {
                if ($post->getUser->id === auth()->user()->id)
                {
                    return $next($request);
                }
            }
        }

        return abort(404);
    }
}
