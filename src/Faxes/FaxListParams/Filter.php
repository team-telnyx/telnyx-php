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
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   direction?: Direction|null,
 *   from?: From|null,
 *   to?: To|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Date range filtering operations for fax creation timestamp.
     */
    #[Optional]
    public ?CreatedAt $created_at;

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
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lt?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $created_at
     * @param Direction|array{eq?: string|null} $direction
     * @param From|array{eq?: string|null} $from
     * @param To|array{eq?: string|null} $to
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        Direction|array|null $direction = null,
        From|array|null $from = null,
        To|array|null $to = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $direction && $obj['direction'] = $direction;
        null !== $from && $obj['from'] = $from;
        null !== $to && $obj['to'] = $to;

        return $obj;
    }

    /**
     * Date range filtering operations for fax creation timestamp.
     *
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lt?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Direction filtering operations.
     *
     * @param Direction|array{eq?: string|null} $direction
     */
    public function withDirection(Direction|array $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * From number filtering operations.
     *
     * @param From|array{eq?: string|null} $from
     */
    public function withFrom(From|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * To number filtering operations.
     *
     * @param To|array{eq?: string|null} $to
     */
    public function withTo(To|array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }
}
