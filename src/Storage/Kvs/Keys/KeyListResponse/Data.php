<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys\KeyListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   key?: string|null, sizeBytes?: int|null, updatedAt?: \DateTimeInterface|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $key;

    /**
     * Size of the stored value in bytes.
     */
    #[Optional('size_bytes')]
    public ?int $sizeBytes;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
        ?int $sizeBytes = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $key && $self['key'] = $key;
        null !== $sizeBytes && $self['sizeBytes'] = $sizeBytes;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * Size of the stored value in bytes.
     */
    public function withSizeBytes(int $sizeBytes): self
    {
        $self = clone $this;
        $self['sizeBytes'] = $sizeBytes;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
