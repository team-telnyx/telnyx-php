<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\Type;

/**
 * Verification code result response.
 *
 * @phpstan-type DataShape = array{
 *   phoneNumber: string,
 *   error?: string|null,
 *   type?: value-of<Type>|null,
 *   verificationCodeID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Phone number for which the verification code was created.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * Error message describing why the verification code creation failed.
     */
    #[Optional]
    public ?string $error;

    /**
     * Type of verification method used.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Unique identifier for the verification code.
     */
    #[Optional('verification_code_id')]
    public ?string $verificationCodeID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withPhoneNumber(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $phoneNumber,
        ?string $error = null,
        Type|string|null $type = null,
        ?string $verificationCodeID = null,
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;

        null !== $error && $self['error'] = $error;
        null !== $type && $self['type'] = $type;
        null !== $verificationCodeID && $self['verificationCodeID'] = $verificationCodeID;

        return $self;
    }

    /**
     * Phone number for which the verification code was created.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Error message describing why the verification code creation failed.
     */
    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * Type of verification method used.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Unique identifier for the verification code.
     */
    public function withVerificationCodeID(string $verificationCodeID): self
    {
        $self = clone $this;
        $self['verificationCodeID'] = $verificationCodeID;

        return $self;
    }
}
