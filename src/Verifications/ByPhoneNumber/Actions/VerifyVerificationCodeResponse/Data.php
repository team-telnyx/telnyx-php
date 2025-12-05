<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse\Data\ResponseCode;

/**
 * @phpstan-type DataShape = array{
 *   phone_number: string, response_code: value-of<ResponseCode>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * +E164 formatted phone number.
     */
    #[Api]
    public string $phone_number;

    /**
     * Identifies if the verification code has been accepted or rejected.
     *
     * @var value-of<ResponseCode> $response_code
     */
    #[Api(enum: ResponseCode::class)]
    public string $response_code;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(phone_number: ..., response_code: ...)
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
     * @param ResponseCode|value-of<ResponseCode> $response_code
     */
    public static function with(
        string $phone_number,
        ResponseCode|string $response_code
    ): self {
        $obj = new self;

        $obj['phone_number'] = $phone_number;
        $obj['response_code'] = $response_code;

        return $obj;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['response_code'] = $responseCode;

        return $obj;
    }
}
