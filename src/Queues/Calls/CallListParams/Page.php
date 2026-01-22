<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls\CallListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
 *
 * @phpstan-type PageShape = array{
 *   after?: string|null, before?: string|null, limit?: int|null
 * }
 */
final class Page implements BaseModel
{
    /** @use SdkModel<PageShape> */
    use SdkModel;

    /**
     * Opaque identifier of next page.
     */
    #[Optional]
    public ?string $after;

    /**
     * Opaque identifier of previous page.
     */
    #[Optional]
    public ?string $before;

    /**
     * Limit of records per single page.
     */
    #[Optional]
    public ?int $limit;

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
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * Opaque identifier of next page.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Opaque identifier of previous page.
     */
    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * Limit of records per single page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
