<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse\Data;

/**
 * @phpstan-type verify_verification_code_response = array{data: Data}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerifyVerificationCodeResponse implements BaseModel
{
    /** @use SdkModel<verify_verification_code_response> */
    use SdkModel;

    #[Api]
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
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
