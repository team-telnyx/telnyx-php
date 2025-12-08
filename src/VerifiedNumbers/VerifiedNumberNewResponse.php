<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerifiedNumberNewResponseShape = array{
 *   phone_number?: string|null, verification_method?: string|null
 * }
 */
final class VerifiedNumberNewResponse implements BaseModel
{
    /** @use SdkModel<VerifiedNumberNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $phone_number;

    #[Optional]
    public ?string $verification_method;

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
        ?string $phone_number = null,
        ?string $verification_method = null
    ): self {
        $obj = new self;

        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $verification_method && $obj['verification_method'] = $verification_method;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    public function withVerificationMethod(string $verificationMethod): self
    {
        $obj = clone $this;
        $obj['verification_method'] = $verificationMethod;

        return $obj;
    }
}
