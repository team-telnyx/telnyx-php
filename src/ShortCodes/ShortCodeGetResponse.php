<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCode;

/**
 * @phpstan-type short_code_get_response = array{data?: ShortCode|null}
 */
final class ShortCodeGetResponse implements BaseModel
{
    /** @use SdkModel<short_code_get_response> */
    use SdkModel;

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
