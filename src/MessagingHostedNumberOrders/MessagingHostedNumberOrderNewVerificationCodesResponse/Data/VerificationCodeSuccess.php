<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeSuccess\Type;

/**
 * Successful verification code creation response.
 *
 * @phpstan-type verification_code_success = array{
 *   phoneNumber: string, type: value-of<Type>, verificationCodeID: string
 * }
 */
final class VerificationCodeSuccess implements BaseModel
{
    /** @use SdkModel<verification_code_success> */
    use SdkModel;

    /**
     * Phone number for which the verification code was created.
     */
    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * Type of verification method used.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * Unique identifier for the verification code.
     */
    #[Api('verification_code_id')]
    public string $verificationCodeID;

    /**
     * `new VerificationCodeSuccess()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCodeSuccess::with(
     *   phoneNumber: ..., type: ..., verificationCodeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationCodeSuccess)
     *   ->withPhoneNumber(...)
     *   ->withType(...)
     *   ->withVerificationCodeID(...)
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
        Type|string $type,
        string $verificationCodeID
    ): self {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;
        $obj->type = $type instanceof Type ? $type->value : $type;
        $obj->verificationCodeID = $verificationCodeID;

        return $obj;
    }

    /**
     * Phone number for which the verification code was created.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Type of verification method used.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * Unique identifier for the verification code.
     */
    public function withVerificationCodeID(string $verificationCodeID): self
    {
        $obj = clone $this;
        $obj->verificationCodeID = $verificationCodeID;

        return $obj;
    }
}
