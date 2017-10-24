<?php

namespace Modules\Admin\Http\Middleware;

use DB;
use Closure;
use Illuminate\Http\Request;
use League\OAuth2\Server\ResourceServer;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;

class PassportCustomProviderAccessToken
{
    private $server;

    public function __construct(ResourceServer $server)
    {
        $this->server = $server;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $psr = (new DiactorosFactory)->createRequest($request);

        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $tokenId = $psr->getAttribute('oauth_access_token_id');
            if ($tokenId) {
                $accessToken = DB::table('oauth_access_token_providers')
                    ->where('oauth_access_token_id', $tokenId)
                    ->first();

                if ($accessToken) {
                    config(['auth.guards.api.provider' => $accessToken->provider]);
                }
            }
        } catch (\Exception $e) {
            //
        }

        return $next($request);
    }
}
