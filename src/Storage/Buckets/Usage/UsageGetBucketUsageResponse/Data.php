<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   numObjects?: int|null,
 *   size?: int|null,
 *   sizeKB?: int|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The number of objects in the bucket.
     */
    #[Optional('num_objects')]
    public ?int $numObjects;

    /**
     * The size of the bucket in bytes.
     */
    #[Optional]
    public ?int $size;

    /**
     * The size of the bucket in kilobytes.
     */
    #[Optional('size_kb')]
    public ?int $sizeKB;

    /**
     * The time the snapshot was taken.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

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
        ?int $numObjects = null,
        ?int $size = null,
        ?int $sizeKB = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $numObjects && $self['numObjects'] = $numObjects;
        null !== $size && $self['size'] = $size;
        null !== $sizeKB && $self['sizeKB'] = $sizeKB;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The number of objects in the bucket.
     */
    public function withNumObjects(int $numObjects): self
    {
        $self = clone $this;
        $self['numObjects'] = $numObjects;

        return $self;
    }

    /**
     * The size of the bucket in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * The size of the bucket in kilobytes.
     */
    public function withSizeKB(int $sizeKB): self
    {
        $self = clone $this;
        $self['sizeKB'] = $sizeKB;

        return $self;
    }

    /**
     * The time the snapshot was taken.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
