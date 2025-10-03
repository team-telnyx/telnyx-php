<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type verification_get_response = array{data: Verification}
 */
final class VerificationGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<verification_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Verification $data;

    /**
     * `new VerificationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationGetResponse)->withData(...)
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
