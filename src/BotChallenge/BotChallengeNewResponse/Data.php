<?php

declare(strict_types=1);

namespace Telnyx\BotChallenge\BotChallengeNewResponse;

use Telnyx\BotChallenge\BotChallengeNewResponse\Data\ChallengeType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   challengeType: ChallengeType|value-of<ChallengeType>,
 *   nonce: string,
 *   privacyPolicyURL: string,
 *   problem: string,
 *   termsAndConditionsURL: string,
 *   precision?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Type of challenge.
     *
     * @var value-of<ChallengeType> $challengeType
     */
    #[Required('challenge_type', enum: ChallengeType::class)]
    public string $challengeType;

    /**
     * Single-use challenge identifier. Submit it as `bot_challenge_nonce` on the signup request.
     */
    #[Required]
    public string $nonce;

    /**
     * Current privacy-policy URL. Echo this back on the signup request.
     */
    #[Required('privacy_policy_url')]
    public string $privacyPolicyURL;

    /**
     * Problem text to solve. Math problems are obfuscated and end with an unobfuscated rounding instruction; string and binary problems are returned as-is.
     */
    #[Required]
    public string $problem;

    /**
     * Current terms-and-conditions URL. Echo this back on the signup request.
     */
    #[Required('terms_and_conditions_url')]
    public string $termsAndConditionsURL;

    /**
     * Decimal places expected in the answer. Present only for math challenges.
     */
    #[Optional]
    public ?int $precision;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   challengeType: ...,
     *   nonce: ...,
     *   privacyPolicyURL: ...,
     *   problem: ...,
     *   termsAndConditionsURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withChallengeType(...)
     *   ->withNonce(...)
     *   ->withPrivacyPolicyURL(...)
     *   ->withProblem(...)
     *   ->withTermsAndConditionsURL(...)
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
     *
     * @param ChallengeType|value-of<ChallengeType> $challengeType
     */
    public static function with(
        ChallengeType|string $challengeType,
        string $nonce,
        string $privacyPolicyURL,
        string $problem,
        string $termsAndConditionsURL,
        ?int $precision = null,
    ): self {
        $self = new self;

        $self['challengeType'] = $challengeType;
        $self['nonce'] = $nonce;
        $self['privacyPolicyURL'] = $privacyPolicyURL;
        $self['problem'] = $problem;
        $self['termsAndConditionsURL'] = $termsAndConditionsURL;

        null !== $precision && $self['precision'] = $precision;

        return $self;
    }

    /**
     * Type of challenge.
     *
     * @param ChallengeType|value-of<ChallengeType> $challengeType
     */
    public function withChallengeType(ChallengeType|string $challengeType): self
    {
        $self = clone $this;
        $self['challengeType'] = $challengeType;

        return $self;
    }

    /**
     * Single-use challenge identifier. Submit it as `bot_challenge_nonce` on the signup request.
     */
    public function withNonce(string $nonce): self
    {
        $self = clone $this;
        $self['nonce'] = $nonce;

        return $self;
    }

    /**
     * Current privacy-policy URL. Echo this back on the signup request.
     */
    public function withPrivacyPolicyURL(string $privacyPolicyURL): self
    {
        $self = clone $this;
        $self['privacyPolicyURL'] = $privacyPolicyURL;

        return $self;
    }

    /**
     * Problem text to solve. Math problems are obfuscated and end with an unobfuscated rounding instruction; string and binary problems are returned as-is.
     */
    public function withProblem(string $problem): self
    {
        $self = clone $this;
        $self['problem'] = $problem;

        return $self;
    }

    /**
     * Current terms-and-conditions URL. Echo this back on the signup request.
     */
    public function withTermsAndConditionsURL(
        string $termsAndConditionsURL
    ): self {
        $self = clone $this;
        $self['termsAndConditionsURL'] = $termsAndConditionsURL;

        return $self;
    }

    /**
     * Decimal places expected in the answer. Present only for math challenges.
     */
    public function withPrecision(int $precision): self
    {
        $self = clone $this;
        $self['precision'] = $precision;

        return $self;
    }
}
