<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\FaxListParams\Filter\CreatedAt;
use Telnyx\Faxes\FaxListParams\Filter\Direction;
use Telnyx\Faxes\FaxListParams\Filter\From;
use Telnyx\Faxes\FaxListParams\Filter\To;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\Faxes\FaxListParams\Filter\CreatedAt
 * @phpstan-import-type DirectionShape from \Telnyx\Faxes\FaxListParams\Filter\Direction
 * @phpstan-import-type FromShape from \Telnyx\Faxes\FaxListParams\Filter\From
 * @phpstan-import-type ToShape from \Telnyx\Faxes\FaxListParams\Filter\To
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   direction?: null|Direction|DirectionShape,
 *   from?: null|From|FromShape,
 *   to?: null|To|ToShape,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Date range filtering operations for fax creation timestamp.
     */
    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * Direction filtering operations.
     */
    #[Optional]
    public ?Direction $direction;

    /**
     * From number filtering operations.
     */
    #[Optional]
    public ?From $from;

    /**
     * To number filtering operations.
     */
    #[Optional]
    public ?To $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAtShape $createdAt
     * @param DirectionShape $direction
     * @param FromShape $from
     * @param ToShape $to
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        Direction|array|null $direction = null,
        From|array|null $from = null,
        To|array|null $to = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $direction && $self['direction'] = $direction;
        null !== $from && $self['from'] = $from;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Date range filtering operations for fax creation timestamp.
     *
     * @param CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Direction filtering operations.
     *
     * @param DirectionShape $direction
     */
    public function withDirection(Direction|array $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * From number filtering operations.
     *
     * @param FromShape $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * To number filtering operations.
     *
     * @param ToShape $to
     */
    public function withTo(To|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
