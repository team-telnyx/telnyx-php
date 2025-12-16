<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse\Content;

/**
 * @phpstan-import-type ContentShape from \Telnyx\Storage\Buckets\BucketNewPresignedURLResponse\Content
 *
 * @phpstan-type BucketNewPresignedURLResponseShape = array{
 *   content?: null|Content|ContentShape
 * }
 */
final class BucketNewPresignedURLResponse implements BaseModel
{
    /** @use SdkModel<BucketNewPresignedURLResponseShape> */
    use SdkModel;

    #[Optional]
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
     * @param ContentShape $content
     */
    public static function with(Content|array|null $content = null): self
    {
        $self = new self;

        null !== $content && $self['content'] = $content;

        return $self;
    }

    /**
     * @param ContentShape $content
     */
    public function withContent(Content|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }
}
