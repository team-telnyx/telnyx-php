<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlashcallShape = array{
 *   default_verification_timeout_secs?: int|null
 * }
 */
final class Flashcall implements BaseModel
{
    /** @use SdkModel<FlashcallShape> */
    use SdkModel;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Api(optional: true)]
    public ?int $default_verification_timeout_secs;

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
        ?int $default_verification_timeout_secs = null
    ): self {
        $obj = new self;

        null !== $default_verification_timeout_secs && $obj->default_verification_timeout_secs = $default_verification_timeout_secs;

        return $obj;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj->default_verification_timeout_secs = $defaultVerificationTimeoutSecs;

        return $obj;
    }
}
