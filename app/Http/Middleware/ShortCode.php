<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ShortCode as ShortCodeModel;

class ShortCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response= $next($request);

        $content=$response->getContent();
        $short_codes = ShortCodeModel::select('shortcode', 'replace')->get();
        //dd($short_codes);
        foreach ($short_codes as $short_code) {
           if (str_contains($content, $short_code->shortcode)) {
               $content = str_replace($short_code->shortcode, $short_code->replace, $content);
           }
        }
        $response->setContent($content);
        return $response;
    }
}
