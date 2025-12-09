<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after].
 *
 * @phpstan-type FilterShape = array{
 *   createdAfter?: \DateTimeInterface|null,
 *   createdBefore?: \DateTimeInterface|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter for audit events created after a specific date.
     */
    #[Optional('created_after')]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Filter for audit events created before a specific date.
     */
    #[Optional('created_before')]
    public ?\DateTimeInterface $createdBefore;

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
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
    ): self {
        $obj = new self;

        null !== $createdAfter && $obj['createdAfter'] = $createdAfter;
        null !== $createdBefore && $obj['createdBefore'] = $createdBefore;

        return $obj;
    }

    /**
     * Filter for audit events created after a specific date.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj['createdAfter'] = $createdAfter;

        return $obj;
    }

    /**
     * Filter for audit events created before a specific date.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj['createdBefore'] = $createdBefore;

        return $obj;
    }
}
