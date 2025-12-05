<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfileUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlashcallShape = array{
 *   default_verification_timeout_secs?: int|null,
 *   whitelisted_destinations?: list<string>|null,
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

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @var list<string>|null $whitelisted_destinations
     */
    #[Api(list: 'string', optional: true)]
    public ?array $whitelisted_destinations;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $whitelisted_destinations
     */
    public static function with(
        ?int $default_verification_timeout_secs = null,
        ?array $whitelisted_destinations = null,
    ): self {
        $obj = new self;

        null !== $default_verification_timeout_secs && $obj['default_verification_timeout_secs'] = $default_verification_timeout_secs;
        null !== $whitelisted_destinations && $obj['whitelisted_destinations'] = $whitelisted_destinations;

        return $obj;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj['default_verification_timeout_secs'] = $defaultVerificationTimeoutSecs;

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
        $obj['whitelisted_destinations'] = $whitelistedDestinations;

        return $obj;
    }
}
