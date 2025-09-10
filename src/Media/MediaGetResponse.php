<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type media_get_response = array{data?: MediaResource|null}
 */
final class MediaGetResponse implements BaseModel
{
    /** @use SdkModel<media_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?MediaResource $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MediaResource $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MediaResource $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
