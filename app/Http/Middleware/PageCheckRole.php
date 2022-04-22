<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class PageCheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $param = null)
    {
        $role = Role::find(Auth::user()->role_id)->first();
        $page = Page::where('name', $param)->firstOrFail();

        if ($page->is_admin === $role->is_admin || $role->pages()->pluck('page_id')->has($page->id)) {
            return $next($request);
        }
        return abort(404);
    }
}
