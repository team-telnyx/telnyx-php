<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfileCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlashcallShape = array{
 *   defaultVerificationTimeoutSecs?: int|null,
 *   whitelistedDestinations?: list<string>|null,
 * }
 */
final class Flashcall implements BaseModel
{
    /** @use SdkModel<FlashcallShape> */
    use SdkModel;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Optional('default_verification_timeout_secs')]
    public ?int $defaultVerificationTimeoutSecs;

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @var list<string>|null $whitelistedDestinations
     */
    #[Optional('whitelisted_destinations', list: 'string')]
    public ?array $whitelistedDestinations;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $whitelistedDestinations
     */
    public static function with(
        ?int $defaultVerificationTimeoutSecs = null,
        ?array $whitelistedDestinations = null,
    ): self {
        $self = new self;

        null !== $defaultVerificationTimeoutSecs && $self['defaultVerificationTimeoutSecs'] = $defaultVerificationTimeoutSecs;
        null !== $whitelistedDestinations && $self['whitelistedDestinations'] = $whitelistedDestinations;

        return $self;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $self = clone $this;
        $self['defaultVerificationTimeoutSecs'] = $defaultVerificationTimeoutSecs;

        return $self;
    }

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @param list<string> $whitelistedDestinations
     */
    public function withWhitelistedDestinations(
        array $whitelistedDestinations
    ): self {
        $self = clone $this;
        $self['whitelistedDestinations'] = $whitelistedDestinations;

        return $self;
    }
}
