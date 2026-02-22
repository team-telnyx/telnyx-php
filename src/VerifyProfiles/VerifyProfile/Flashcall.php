<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlashcallShape = array{
 *   appName?: string|null, defaultVerificationTimeoutSecs?: int|null
 * }
 */
final class Flashcall implements BaseModel
{
    /** @use SdkModel<FlashcallShape> */
    use SdkModel;

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    #[Optional('app_name')]
    public ?string $appName;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Optional('default_verification_timeout_secs')]
    public ?int $defaultVerificationTimeoutSecs;

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
        ?string $appName = null,
        ?int $defaultVerificationTimeoutSecs = null
    ): self {
        $self = new self;

        null !== $appName && $self['appName'] = $appName;
        null !== $defaultVerificationTimeoutSecs && $self['defaultVerificationTimeoutSecs'] = $defaultVerificationTimeoutSecs;

        return $self;
    }

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    public function withAppName(string $appName): self
    {
        $self = clone $this;
        $self['appName'] = $appName;

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
}
