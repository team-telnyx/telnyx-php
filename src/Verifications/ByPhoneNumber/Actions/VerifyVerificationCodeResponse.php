<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse\Data;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse\Data\ResponseCode;

/**
 * @phpstan-type VerifyVerificationCodeResponseShape = array{data: Data}
 */
final class VerifyVerificationCodeResponse implements BaseModel
{
    /** @use SdkModel<VerifyVerificationCodeResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new VerifyVerificationCodeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyVerificationCodeResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyVerificationCodeResponse)->withData(...)
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
     * @param Data|array{
     *   phoneNumber: string, responseCode: value-of<ResponseCode>
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   phoneNumber: string, responseCode: value-of<ResponseCode>
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
