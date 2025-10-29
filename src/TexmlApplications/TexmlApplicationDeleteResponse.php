<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TexmlApplicationDeleteResponseShape = array{
 *   data?: TexmlApplication
 * }
 */
final class TexmlApplicationDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TexmlApplicationDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?TexmlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?TexmlApplication $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(TexmlApplication $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
