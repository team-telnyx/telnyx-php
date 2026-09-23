<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BotSignup\BotSignupCreateParams;
use Telnyx\BotSignup\BotSignupResendMagicLinkParams;
use Telnyx\BotSignup\SuccessResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BotSignupRawContract;

/**
 * Agentic (bot) signup for Telnyx accounts. An AI agent solves a reverse-CAPTCHA challenge designed to be easy for LLMs and hard for humans, registers an account, and signs in by consuming a magic link emailed to the account owner. All endpoints are public and unauthenticated; signup endpoints are additionally gated by the freemium feature flags and per-country availability.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BotSignupRawService implements BotSignupRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a freemium Telnyx account through the agentic signup flow. The request must carry a valid answer to a previously issued bot challenge (`bot_challenge_nonce` and `bot_challenge_answer`), accept the terms of service, and echo the exact terms-and-conditions and privacy-policy URLs returned by the challenge endpoint. When EU consent enforcement is enabled, `terms_of_service_eu` and `terms_and_conditions_eu_url` are also required. On success a one-time sign-in (magic) link is emailed to the address provided; if the email address belongs to an existing account, a sign-in link is sent instead of creating a duplicate account. `email` may only be omitted when placeholder-email registration is enabled server-side. This endpoint is public and unauthenticated, gated by the freemium feature flags and per-country availability, and subject to per-IP and per-domain registration limits.
     *
     * @param array{
     *   botChallengeAnswer: string,
     *   botChallengeNonce: string,
     *   privacyPolicyURL: string,
     *   termsAndConditionsURL: string,
     *   termsOfService: bool,
     *   email?: string,
     *   termsAndConditionsEuURL?: string,
     *   termsOfServiceEu?: bool,
     * }|BotSignupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SuccessResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BotSignupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BotSignupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/bot_signup',
            body: (object) $parsed,
            options: $options,
            convert: SuccessResponse::class,
        );
    }

    /**
     * @api
     *
     * Resends the one-time sign-in (magic) link for an eligible bot signup account. Eligibility (account exists, was registered through bot signup, is active, and has not exceeded the resend limit or rate window) is evaluated server-side; the response is intentionally uniform and does not reveal whether the account exists or whether a link was actually sent. This endpoint is public and unauthenticated, gated by the freemium feature flags and per-country availability.
     *
     * @param array{email: string}|BotSignupResendMagicLinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SuccessResponse>
     *
     * @throws APIException
     */
    public function resendMagicLink(
        array|BotSignupResendMagicLinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BotSignupResendMagicLinkParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/bot_signup/resend_magic_link',
            body: (object) $parsed,
            options: $options,
            convert: SuccessResponse::class,
        );
    }
}
