<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\BucketCreatePresignedURLParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BodyShape = array{ttl?: int|null}
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
    use SdkModel;

    /**
     * The time to live of the token in seconds.
     */
    #[Optional]
    public ?int $ttl;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $ttl = null): self
    {
        $self = new self;

        null !== $ttl && $self['ttl'] = $ttl;

        return $self;
    }

    /**
     * The time to live of the token in seconds.
     */
    public function withTtl(int $ttl): self
    {
        $self = clone $this;
        $self['ttl'] = $ttl;

        return $self;
    }
}
