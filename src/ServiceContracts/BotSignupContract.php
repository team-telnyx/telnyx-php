<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BotSignup\SuccessResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BotSignupContract
{
    /**
     * @api
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
    ): SuccessResponse;

    /**
     * @api
     *
     * @param string $email email address of the bot signup account to resend the magic link to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resendMagicLink(
        string $email,
        RequestOptions|array|null $requestOptions = null
    ): SuccessResponse;
}
