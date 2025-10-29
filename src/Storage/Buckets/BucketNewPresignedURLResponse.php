<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse\Content;

/**
 * @phpstan-type BucketNewPresignedURLResponseShape = array{content?: Content}
 */
final class BucketNewPresignedURLResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BucketNewPresignedURLResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Content $content;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Content $content = null): self
    {
        $obj = new self;

        null !== $content && $obj->content = $content;

        return $obj;
    }

    public function withContent(Content $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }
}
