<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerifiedNumberNewResponseShape = array{
 *   phoneNumber?: string|null, verificationMethod?: string|null
 * }
 */
final class VerifiedNumberNewResponse implements BaseModel
{
    /** @use SdkModel<VerifiedNumberNewResponseShape> */
    use SdkModel;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('verification_method')]
    public ?string $verificationMethod;

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
        ?string $phoneNumber = null,
        ?string $verificationMethod = null
    ): self {
        $self = new self;

        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $verificationMethod && $self['verificationMethod'] = $verificationMethod;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withVerificationMethod(string $verificationMethod): self
    {
        $self = clone $this;
        $self['verificationMethod'] = $verificationMethod;

        return $self;
    }
}
