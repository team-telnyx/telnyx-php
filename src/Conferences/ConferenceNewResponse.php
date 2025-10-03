<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type conference_new_response = array{data?: Conference}
 */
final class ConferenceNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<conference_new_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Conference $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Conference $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Conference $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
