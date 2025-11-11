<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type NumberOrderPhoneNumberGetResponseShape = array{
 *   data?: NumberOrderPhoneNumber|null
 * }
 */
final class NumberOrderPhoneNumberGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberOrderPhoneNumberGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?NumberOrderPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NumberOrderPhoneNumber $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(NumberOrderPhoneNumber $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
