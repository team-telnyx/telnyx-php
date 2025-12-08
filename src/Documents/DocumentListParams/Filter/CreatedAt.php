<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams\Filter;

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
     * Filter by created at greater than provided value.
     */
    #[Optional]
    public ?\DateTimeInterface $gt;

    /**
     * Filter by created at less than provided value.
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
     * Filter by created at greater than provided value.
     */
    public function withGt(\DateTimeInterface $gt): self
    {
        $obj = clone $this;
        $obj['gt'] = $gt;

        return $obj;
    }

    /**
     * Filter by created at less than provided value.
     */
    public function withLt(\DateTimeInterface $lt): self
    {
        $obj = clone $this;
        $obj['lt'] = $lt;

        return $obj;
    }
}
