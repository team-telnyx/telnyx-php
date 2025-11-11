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
 * @phpstan-type VerificationCodeSuccessShape = array{
 *   phone_number: string, type: value-of<Type>, verification_code_id: string
 * }
 */
final class VerificationCodeSuccess implements BaseModel
{
    /** @use SdkModel<VerificationCodeSuccessShape> */
    use SdkModel;

    /**
     * Phone number for which the verification code was created.
     */
    #[Api]
    public string $phone_number;

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
    #[Api]
    public string $verification_code_id;

    /**
     * `new VerificationCodeSuccess()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCodeSuccess::with(
     *   phone_number: ..., type: ..., verification_code_id: ...
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
        string $phone_number,
        Type|string $type,
        string $verification_code_id
    ): self {
        $obj = new self;

        $obj->phone_number = $phone_number;
        $obj['type'] = $type;
        $obj->verification_code_id = $verification_code_id;

        return $obj;
    }

    /**
     * Phone number for which the verification code was created.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Unique identifier for the verification code.
     */
    public function withVerificationCodeID(string $verificationCodeID): self
    {
        $obj = clone $this;
        $obj->verification_code_id = $verificationCodeID;

        return $obj;
    }
}
