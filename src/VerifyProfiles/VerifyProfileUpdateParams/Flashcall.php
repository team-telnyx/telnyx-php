<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfileUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type flashcall_alias = array{
 *   defaultVerificationTimeoutSecs?: int, whitelistedDestinations?: list<string>
 * }
 */
final class Flashcall implements BaseModel
{
    /** @use SdkModel<flashcall_alias> */
    use SdkModel;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Api('default_verification_timeout_secs', optional: true)]
    public ?int $defaultVerificationTimeoutSecs;

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @var list<string>|null $whitelistedDestinations
     */
    #[Api('whitelisted_destinations', list: 'string', optional: true)]
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
     * @param list<string> $whitelistedDestinations
     */
    public static function with(
        ?int $defaultVerificationTimeoutSecs = null,
        ?array $whitelistedDestinations = null,
    ): self {
        $obj = new self;

        null !== $defaultVerificationTimeoutSecs && $obj->defaultVerificationTimeoutSecs = $defaultVerificationTimeoutSecs;
        null !== $whitelistedDestinations && $obj->whitelistedDestinations = $whitelistedDestinations;

        return $obj;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj->defaultVerificationTimeoutSecs = $defaultVerificationTimeoutSecs;

        return $obj;
    }

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @param list<string> $whitelistedDestinations
     */
    public function withWhitelistedDestinations(
        array $whitelistedDestinations
    ): self {
        $obj = clone $this;
        $obj->whitelistedDestinations = $whitelistedDestinations;

        return $obj;
    }
}
