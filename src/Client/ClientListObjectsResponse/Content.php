<?php

declare(strict_types=1);

namespace Telnyx\Client\ClientListObjectsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type content_alias = array{
 *   key?: string, lastModified?: \DateTimeInterface, size?: float
 * }
 */
final class Content implements BaseModel
{
    /** @use SdkModel<content_alias> */
    use SdkModel;

    #[Api('Key', optional: true)]
    public ?string $key;

    #[Api('LastModified', optional: true)]
    public ?\DateTimeInterface $lastModified;

    #[Api('Size', optional: true)]
    public ?float $size;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $key = null,
        ?\DateTimeInterface $lastModified = null,
        ?float $size = null,
    ): self {
        $obj = new self;

        null !== $key && $obj->key = $key;
        null !== $lastModified && $obj->lastModified = $lastModified;
        null !== $size && $obj->size = $size;

        return $obj;
    }

    public function withKey(string $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }

    public function withLastModified(\DateTimeInterface $lastModified): self
    {
        $obj = clone $this;
        $obj->lastModified = $lastModified;

        return $obj;
    }

    public function withSize(float $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }
}
