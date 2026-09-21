<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BotSessions\BotSessionListParams;
use Telnyx\BotSessions\BotSessionListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BotSessionsRawContract;

/**
 * Agentic (bot) signup for Telnyx accounts. An AI agent solves a reverse-CAPTCHA challenge designed to be easy for LLMs and hard for humans, registers an account, and signs in by consuming a magic link emailed to the account owner. All endpoints are public and unauthenticated; signup endpoints are additionally gated by the freemium feature flags and per-country availability.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BotSessionsRawService implements BotSessionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Consumes the one-time portal redirect (magic link) token emailed during bot signup and returns an API session. The token is a UUIDv7 that encodes its creation time; it expires after a configurable validity window (15 minutes by default) and is cleared on first use. Although the action creates a session, the route uses the GET verb because it is opened from an email link. On first use the account is also initialized. For bot signup (freemium) accounts the response is a minimal envelope containing only the `api_v2_token`; accounts that are permitted to use magic links but are not freemium accounts may instead receive an extended session payload when additional steps (such as two-factor authentication or identity verification) are required. This endpoint is public; the magic link token in the query string is the credential.
     *
     * @param array{
     *   email: string, portalRedirectToken: string
     * }|BotSessionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BotSessionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BotSessionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BotSessionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/bot_sessions',
            query: Util::array_transform_keys(
                $parsed,
                ['portalRedirectToken' => 'portal_redirect_token']
            ),
            options: $options,
            convert: BotSessionListResponse::class,
        );
    }
}
