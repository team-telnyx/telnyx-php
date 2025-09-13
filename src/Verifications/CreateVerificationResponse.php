<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type create_verification_response = array{data: Verification}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CreateVerificationResponse implements BaseModel
{
    /** @use SdkModel<create_verification_response> */
    use SdkModel;

    #[Api]
    public Verification $data;

    /**
     * `new CreateVerificationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreateVerificationResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreateVerificationResponse)->withData(...)
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
    public static function with(Verification $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Verification $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
