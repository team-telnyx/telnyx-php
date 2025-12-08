<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\Type;

/**
 * Verification code result response.
 *
 * @phpstan-type DataShape = array{
 *   phone_number: string,
 *   error?: string|null,
 *   type?: value-of<Type>|null,
 *   verification_code_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Phone number for which the verification code was created.
     */
    #[Api]
    public string $phone_number;

    /**
     * Error message describing why the verification code creation failed.
     */
    #[Api(optional: true)]
    public ?string $error;

    /**
     * Type of verification method used.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Unique identifier for the verification code.
     */
    #[Api(optional: true)]
    public ?string $verification_code_id;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(phone_number: ...)
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
        string $phone_number,
        ?string $error = null,
        Type|string|null $type = null,
        ?string $verification_code_id = null,
    ): self {
        $obj = new self;

        $obj['phone_number'] = $phone_number;

        null !== $error && $obj['error'] = $error;
        null !== $type && $obj['type'] = $type;
        null !== $verification_code_id && $obj['verification_code_id'] = $verification_code_id;

        return $obj;
    }

    /**
     * Phone number for which the verification code was created.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Error message describing why the verification code creation failed.
     */
    public function withError(string $error): self
    {
        $obj = clone $this;
        $obj['error'] = $error;

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
        $obj['verification_code_id'] = $verificationCodeID;

        return $obj;
    }
}
