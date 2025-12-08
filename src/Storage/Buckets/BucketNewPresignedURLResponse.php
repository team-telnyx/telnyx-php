<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse\Content;

/**
 * @phpstan-type BucketNewPresignedURLResponseShape = array{content?: Content|null}
 */
final class BucketNewPresignedURLResponse implements BaseModel
{
    /** @use SdkModel<BucketNewPresignedURLResponseShape> */
    use SdkModel;

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
     *
     * @param Content|array{
     *   token?: string|null,
     *   expires_at?: \DateTimeInterface|null,
     *   presigned_url?: string|null,
     * } $content
     */
    public static function with(Content|array|null $content = null): self
    {
        $obj = new self;

        null !== $content && $obj['content'] = $content;

        return $obj;
    }

    /**
     * @param Content|array{
     *   token?: string|null,
     *   expires_at?: \DateTimeInterface|null,
     *   presigned_url?: string|null,
     * } $content
     */
    public function withContent(Content|array $content): self
    {
        $obj = clone $this;
        $obj['content'] = $content;

        return $obj;
    }
}
