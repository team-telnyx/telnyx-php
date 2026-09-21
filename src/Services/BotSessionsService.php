<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BotSessions\BotSessionListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BotSessionsContract;

/**
 * Agentic (bot) signup for Telnyx accounts. An AI agent solves a reverse-CAPTCHA challenge designed to be easy for LLMs and hard for humans, registers an account, and signs in by consuming a magic link emailed to the account owner. All endpoints are public and unauthenticated; signup endpoints are additionally gated by the freemium feature flags and per-country availability.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BotSessionsService implements BotSessionsContract
{
    /**
     * @api
     */
    public BotSessionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BotSessionsRawService($client);
    }

    /**
     * @api
     *
     * Consumes the one-time portal redirect (magic link) token emailed during bot signup and returns an API session. The token is a UUIDv7 that encodes its creation time; it expires after a configurable validity window (15 minutes by default) and is cleared on first use. Although the action creates a session, the route uses the GET verb because it is opened from an email link. On first use the account is also initialized. For bot signup (freemium) accounts the response is a minimal envelope containing only the `api_v2_token`; accounts that are permitted to use magic links but are not freemium accounts may instead receive an extended session payload when additional steps (such as two-factor authentication or identity verification) are required. This endpoint is public; the magic link token in the query string is the credential.
     *
     * @param string $email email address associated with the magic link token
     * @param string $portalRedirectToken single-use portal redirect (magic link) token, a UUIDv7 sent to the account owner's email
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $email,
        string $portalRedirectToken,
        RequestOptions|array|null $requestOptions = null,
    ): BotSessionListResponse {
        $params = [
            'email' => $email, 'portalRedirectToken' => $portalRedirectToken,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
