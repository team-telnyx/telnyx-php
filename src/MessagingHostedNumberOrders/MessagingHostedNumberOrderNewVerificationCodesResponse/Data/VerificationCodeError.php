<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Failed verification code creation response.
 *
 * @phpstan-type VerificationCodeErrorShape = array{
 *   error: string, phone_number: string
 * }
 */
final class VerificationCodeError implements BaseModel
{
    /** @use SdkModel<VerificationCodeErrorShape> */
    use SdkModel;

    /**
     * Error message describing why the verification code creation failed.
     */
    #[Api]
    public string $error;

    /**
     * Phone number for which the verification code creation failed.
     */
    #[Api]
    public string $phone_number;

    /**
     * `new VerificationCodeError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCodeError::with(error: ..., phone_number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationCodeError)->withError(...)->withPhoneNumber(...)
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
     */
    public static function with(string $error, string $phone_number): self
    {
        $obj = new self;

        $obj->error = $error;
        $obj->phone_number = $phone_number;

        return $obj;
    }

    /**
     * Error message describing why the verification code creation failed.
     */
    public function withError(string $error): self
    {
        $obj = clone $this;
        $obj->error = $error;

        return $obj;
    }

    /**
     * Phone number for which the verification code creation failed.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }
}
