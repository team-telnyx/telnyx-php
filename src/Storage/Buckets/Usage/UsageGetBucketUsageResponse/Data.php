<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   numObjects?: int|null,
 *   size?: int|null,
 *   sizeKB?: int|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The number of objects in the bucket.
     */
    #[Api('num_objects', optional: true)]
    public ?int $numObjects;

    /**
     * The size of the bucket in bytes.
     */
    #[Api(optional: true)]
    public ?int $size;

    /**
     * The size of the bucket in kilobytes.
     */
    #[Api('size_kb', optional: true)]
    public ?int $sizeKB;

    /**
     * The time the snapshot was taken.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $numObjects && $obj->numObjects = $numObjects;
        null !== $size && $obj->size = $size;
        null !== $sizeKB && $obj->sizeKB = $sizeKB;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The number of objects in the bucket.
     */
    public function withNumObjects(int $numObjects): self
    {
        $obj = clone $this;
        $obj->numObjects = $numObjects;

        return $obj;
    }

    /**
     * The size of the bucket in bytes.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    /**
     * The size of the bucket in kilobytes.
     */
    public function withSizeKB(int $sizeKB): self
    {
        $obj = clone $this;
        $obj->sizeKB = $sizeKB;

        return $obj;
    }

    /**
     * The time the snapshot was taken.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
