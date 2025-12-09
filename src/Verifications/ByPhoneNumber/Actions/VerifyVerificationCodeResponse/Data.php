<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse\Data\ResponseCode;

/**
 * @phpstan-type DataShape = array{
 *   phoneNumber: string, responseCode: value-of<ResponseCode>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * +E164 formatted phone number.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * Identifies if the verification code has been accepted or rejected.
     *
     * @var value-of<ResponseCode> $responseCode
     */
    #[Required('response_code', enum: ResponseCode::class)]
    public string $responseCode;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(phoneNumber: ..., responseCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withPhoneNumber(...)->withResponseCode(...)
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
     * @param ResponseCode|value-of<ResponseCode> $responseCode
     */
    public static function with(
        string $phoneNumber,
        ResponseCode|string $responseCode
    ): self {
        $obj = new self;

        $obj['phoneNumber'] = $phoneNumber;
        $obj['responseCode'] = $responseCode;

        return $obj;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies if the verification code has been accepted or rejected.
     *
     * @param ResponseCode|value-of<ResponseCode> $responseCode
     */
    public function withResponseCode(ResponseCode|string $responseCode): self
    {
        $obj = clone $this;
        $obj['responseCode'] = $responseCode;

        return $obj;
    }
}
