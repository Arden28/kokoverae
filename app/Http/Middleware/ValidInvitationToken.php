<?php

namespace App\Http\Middleware;

use App\Models\Company\CompanyInvitation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidInvitationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->route('token');

        // Check if the token exists and has not expired
        $invitation = CompanyInvitation::where('token', $token)
                                       ->where('expire_at', '>', now())
                                       ->first();

        if (!$invitation) {
            // Redirect to a specific page or show an error if the token is invalid or expired
            // return redirect()->route('home')->with('error', 'Invalid or expired invitation link.');
            return redirect()->route('login', ['subdomain' => current_company()->domain_name])->with('error', 'Invalid or expired invitation link.');
        }

        // Pass the invitation to the next request if valid
        $request->merge(['invitation' => $invitation]);

        return $next($request);
    }
}
