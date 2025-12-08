<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedAtShape = array{
 *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
 * }
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    /**
     * Filters records to those created after a specific date.
     */
    #[Optional]
    public ?\DateTimeInterface $gt;

    /**
     * Filters records to those created before a specific date.
     */
    #[Optional]
    public ?\DateTimeInterface $lt;

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
        ?\DateTimeInterface $gt = null,
        ?\DateTimeInterface $lt = null
    ): self {
        $obj = new self;

        null !== $gt && $obj['gt'] = $gt;
        null !== $lt && $obj['lt'] = $lt;

        return $obj;
    }

    /**
     * Filters records to those created after a specific date.
     */
    public function withGt(\DateTimeInterface $gt): self
    {
        $obj = clone $this;
        $obj['gt'] = $gt;

        return $obj;
    }

    /**
     * Filters records to those created before a specific date.
     */
    public function withLt(\DateTimeInterface $lt): self
    {
        $obj = clone $this;
        $obj['lt'] = $lt;

        return $obj;
    }
}
