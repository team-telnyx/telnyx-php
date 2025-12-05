<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   num_objects?: int|null,
 *   size?: int|null,
 *   size_kb?: int|null,
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
    #[Api(optional: true)]
    public ?int $num_objects;

    /**
     * The size of the bucket in bytes.
     */
    #[Api(optional: true)]
    public ?int $size;

    /**
     * The size of the bucket in kilobytes.
     */
    #[Api(optional: true)]
    public ?int $size_kb;

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
        ?int $num_objects = null,
        ?int $size = null,
        ?int $size_kb = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $num_objects && $obj['num_objects'] = $num_objects;
        null !== $size && $obj['size'] = $size;
        null !== $size_kb && $obj['size_kb'] = $size_kb;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * The number of objects in the bucket.
     */
    public function withNumObjects(int $numObjects): self
    {
        $obj = clone $this;
        $obj['num_objects'] = $numObjects;

        return $obj;
    }

    /**
     * The size of the bucket in bytes.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }

    /**
     * The size of the bucket in kilobytes.
     */
    public function withSizeKB(int $sizeKB): self
    {
        $obj = clone $this;
        $obj['size_kb'] = $sizeKB;

        return $obj;
    }

    /**
     * The time the snapshot was taken.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
