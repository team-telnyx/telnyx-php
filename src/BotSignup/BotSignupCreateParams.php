<?php

declare(strict_types=1);

namespace Telnyx\BotSignup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a freemium Telnyx account through the agentic signup flow. The request must carry a valid answer to a previously issued bot challenge (`bot_challenge_nonce` and `bot_challenge_answer`), accept the terms of service, and echo the exact terms-and-conditions and privacy-policy URLs returned by the challenge endpoint. When EU consent enforcement is enabled, `terms_of_service_eu` and `terms_and_conditions_eu_url` are also required. On success a one-time sign-in (magic) link is emailed to the address provided; if the email address belongs to an existing account, a sign-in link is sent instead of creating a duplicate account. `email` may only be omitted when placeholder-email registration is enabled server-side. This endpoint is public and unauthenticated, gated by the freemium feature flags and per-country availability, and subject to per-IP and per-domain registration limits.
 *
 * @see Telnyx\Services\BotSignupService::create()
 *
 * @phpstan-type BotSignupCreateParamsShape = array{
 *   botChallengeAnswer: string,
 *   botChallengeNonce: string,
 *   privacyPolicyURL: string,
 *   termsAndConditionsURL: string,
 *   termsOfService: bool,
 *   email?: string|null,
 *   termsAndConditionsEuURL?: string|null,
 *   termsOfServiceEu?: bool|null,
 * }
 */
final class BotSignupCreateParams implements BaseModel
{
    /** @use SdkModel<BotSignupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Answer to the issued bot challenge.
     */
    #[Required('bot_challenge_answer')]
    public string $botChallengeAnswer;

    /**
     * Nonce from a previously issued bot challenge.
     */
    #[Required('bot_challenge_nonce')]
    public string $botChallengeNonce;

    /**
     * Must exactly match the privacy-policy URL returned by the challenge endpoint.
     */
    #[Required('privacy_policy_url')]
    public string $privacyPolicyURL;

    /**
     * Must exactly match the terms-and-conditions URL returned by the challenge endpoint.
     */
    #[Required('terms_and_conditions_url')]
    public string $termsAndConditionsURL;

    /**
     * Must be true to accept the terms of service.
     */
    #[Required('terms_of_service')]
    public bool $termsOfService;

    /**
     * Email address for the new account. The magic link is sent here. May only be omitted when placeholder-email registration is enabled server-side.
     */
    #[Optional]
    public ?string $email;

    /**
     * EU terms-and-conditions URL. Required when EU consent enforcement is enabled.
     */
    #[Optional('terms_and_conditions_eu_url')]
    public ?string $termsAndConditionsEuURL;

    /**
     * EU terms-of-service acceptance. Required when EU consent enforcement is enabled.
     */
    #[Optional('terms_of_service_eu')]
    public ?bool $termsOfServiceEu;

    /**
     * `new BotSignupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BotSignupCreateParams::with(
     *   botChallengeAnswer: ...,
     *   botChallengeNonce: ...,
     *   privacyPolicyURL: ...,
     *   termsAndConditionsURL: ...,
     *   termsOfService: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BotSignupCreateParams)
     *   ->withBotChallengeAnswer(...)
     *   ->withBotChallengeNonce(...)
     *   ->withPrivacyPolicyURL(...)
     *   ->withTermsAndConditionsURL(...)
     *   ->withTermsOfService(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $botChallengeAnswer,
        string $botChallengeNonce,
        string $privacyPolicyURL,
        string $termsAndConditionsURL,
        bool $termsOfService,
        ?string $email = null,
        ?string $termsAndConditionsEuURL = null,
        ?bool $termsOfServiceEu = null,
    ): self {
        $self = new self;

        $self['botChallengeAnswer'] = $botChallengeAnswer;
        $self['botChallengeNonce'] = $botChallengeNonce;
        $self['privacyPolicyURL'] = $privacyPolicyURL;
        $self['termsAndConditionsURL'] = $termsAndConditionsURL;
        $self['termsOfService'] = $termsOfService;

        null !== $email && $self['email'] = $email;
        null !== $termsAndConditionsEuURL && $self['termsAndConditionsEuURL'] = $termsAndConditionsEuURL;
        null !== $termsOfServiceEu && $self['termsOfServiceEu'] = $termsOfServiceEu;

        return $self;
    }

    /**
     * Answer to the issued bot challenge.
     */
    public function withBotChallengeAnswer(string $botChallengeAnswer): self
    {
        $self = clone $this;
        $self['botChallengeAnswer'] = $botChallengeAnswer;

        return $self;
    }

    /**
     * Nonce from a previously issued bot challenge.
     */
    public function withBotChallengeNonce(string $botChallengeNonce): self
    {
        $self = clone $this;
        $self['botChallengeNonce'] = $botChallengeNonce;

        return $self;
    }

    /**
     * Must exactly match the privacy-policy URL returned by the challenge endpoint.
     */
    public function withPrivacyPolicyURL(string $privacyPolicyURL): self
    {
        $self = clone $this;
        $self['privacyPolicyURL'] = $privacyPolicyURL;

        return $self;
    }

    /**
     * Must exactly match the terms-and-conditions URL returned by the challenge endpoint.
     */
    public function withTermsAndConditionsURL(
        string $termsAndConditionsURL
    ): self {
        $self = clone $this;
        $self['termsAndConditionsURL'] = $termsAndConditionsURL;

        return $self;
    }

    /**
     * Must be true to accept the terms of service.
     */
    public function withTermsOfService(bool $termsOfService): self
    {
        $self = clone $this;
        $self['termsOfService'] = $termsOfService;

        return $self;
    }

    /**
     * Email address for the new account. The magic link is sent here. May only be omitted when placeholder-email registration is enabled server-side.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * EU terms-and-conditions URL. Required when EU consent enforcement is enabled.
     */
    public function withTermsAndConditionsEuURL(
        string $termsAndConditionsEuURL
    ): self {
        $self = clone $this;
        $self['termsAndConditionsEuURL'] = $termsAndConditionsEuURL;

        return $self;
    }

    /**
     * EU terms-of-service acceptance. Required when EU consent enforcement is enabled.
     */
    public function withTermsOfServiceEu(bool $termsOfServiceEu): self
    {
        $self = clone $this;
        $self['termsOfServiceEu'] = $termsOfServiceEu;

        return $self;
    }
}
