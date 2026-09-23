<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BotSignup\SuccessResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BotSignupContract;

/**
 * Agentic (bot) signup for Telnyx accounts. An AI agent solves a reverse-CAPTCHA challenge designed to be easy for LLMs and hard for humans, registers an account, and signs in by consuming a magic link emailed to the account owner. All endpoints are public and unauthenticated; signup endpoints are additionally gated by the freemium feature flags and per-country availability.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BotSignupService implements BotSignupContract
{
    /**
     * @api
     */
    public BotSignupRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BotSignupRawService($client);
    }

    /**
     * @api
     *
     * Creates a freemium Telnyx account through the agentic signup flow. The request must carry a valid answer to a previously issued bot challenge (`bot_challenge_nonce` and `bot_challenge_answer`), accept the terms of service, and echo the exact terms-and-conditions and privacy-policy URLs returned by the challenge endpoint. When EU consent enforcement is enabled, `terms_of_service_eu` and `terms_and_conditions_eu_url` are also required. On success a one-time sign-in (magic) link is emailed to the address provided; if the email address belongs to an existing account, a sign-in link is sent instead of creating a duplicate account. `email` may only be omitted when placeholder-email registration is enabled server-side. This endpoint is public and unauthenticated, gated by the freemium feature flags and per-country availability, and subject to per-IP and per-domain registration limits.
     *
     * @param string $botChallengeAnswer answer to the issued bot challenge
     * @param string $botChallengeNonce nonce from a previously issued bot challenge
     * @param string $privacyPolicyURL must exactly match the privacy-policy URL returned by the challenge endpoint
     * @param string $termsAndConditionsURL must exactly match the terms-and-conditions URL returned by the challenge endpoint
     * @param bool $termsOfService must be true to accept the terms of service
     * @param string $email Email address for the new account. The magic link is sent here. May only be omitted when placeholder-email registration is enabled server-side.
     * @param string $termsAndConditionsEuURL EU terms-and-conditions URL. Required when EU consent enforcement is enabled.
     * @param bool $termsOfServiceEu EU terms-of-service acceptance. Required when EU consent enforcement is enabled.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $botChallengeAnswer,
        string $botChallengeNonce,
        string $privacyPolicyURL,
        string $termsAndConditionsURL,
        bool $termsOfService,
        ?string $email = null,
        ?string $termsAndConditionsEuURL = null,
        ?bool $termsOfServiceEu = null,
        RequestOptions|array|null $requestOptions = null,
    ): SuccessResponse {
        $params = array_filter(
            [
                'botChallengeAnswer' => $botChallengeAnswer,
                'botChallengeNonce' => $botChallengeNonce,
                'privacyPolicyURL' => $privacyPolicyURL,
                'termsAndConditionsURL' => $termsAndConditionsURL,
                'termsOfService' => $termsOfService,
                'email' => $email ?? Omitted::VALUE,
                'termsAndConditionsEuURL' => $termsAndConditionsEuURL ?? Omitted::VALUE,
                'termsOfServiceEu' => $termsOfServiceEu ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resends the one-time sign-in (magic) link for an eligible bot signup account. Eligibility (account exists, was registered through bot signup, is active, and has not exceeded the resend limit or rate window) is evaluated server-side; the response is intentionally uniform and does not reveal whether the account exists or whether a link was actually sent. This endpoint is public and unauthenticated, gated by the freemium feature flags and per-country availability.
     *
     * @param string $email email address of the bot signup account to resend the magic link to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resendMagicLink(
        string $email,
        RequestOptions|array|null $requestOptions = null
    ): SuccessResponse {
        $params = ['email' => $email];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resendMagicLink(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
