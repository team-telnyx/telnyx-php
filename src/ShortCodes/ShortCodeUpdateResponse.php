<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ShortCode;

/**
 * @phpstan-type short_code_update_response = array{data?: ShortCode}
 */
final class ShortCodeUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<short_code_update_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?ShortCode $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?ShortCode $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(ShortCode $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
