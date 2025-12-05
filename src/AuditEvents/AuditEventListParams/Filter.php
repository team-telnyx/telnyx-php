<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after].
 *
 * @phpstan-type FilterShape = array{
 *   created_after?: \DateTimeInterface|null,
 *   created_before?: \DateTimeInterface|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter for audit events created after a specific date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_after;

    /**
     * Filter for audit events created before a specific date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_before;

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
        ?\DateTimeInterface $created_after = null,
        ?\DateTimeInterface $created_before = null,
    ): self {
        $obj = new self;

        null !== $created_after && $obj['created_after'] = $created_after;
        null !== $created_before && $obj['created_before'] = $created_before;

        return $obj;
    }

    /**
     * Filter for audit events created after a specific date.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj['created_after'] = $createdAfter;

        return $obj;
    }

    /**
     * Filter for audit events created before a specific date.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj['created_before'] = $createdBefore;

        return $obj;
    }
}
