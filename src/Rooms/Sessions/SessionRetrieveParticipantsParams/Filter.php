<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter\DateJoinedAt;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter\DateLeftAt;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter\DateUpdatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context].
 *
 * @phpstan-type FilterShape = array{
 *   context?: string|null,
 *   date_joined_at?: DateJoinedAt|null,
 *   date_left_at?: DateLeftAt|null,
 *   date_updated_at?: DateUpdatedAt|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter room participants based on the context.
     */
    #[Api(optional: true)]
    public ?string $context;

    #[Api(optional: true)]
    public ?DateJoinedAt $date_joined_at;

    #[Api(optional: true)]
    public ?DateLeftAt $date_left_at;

    #[Api(optional: true)]
    public ?DateUpdatedAt $date_updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DateJoinedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_joined_at
     * @param DateLeftAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_left_at
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_updated_at
     */
    public static function with(
        ?string $context = null,
        DateJoinedAt|array|null $date_joined_at = null,
        DateLeftAt|array|null $date_left_at = null,
        DateUpdatedAt|array|null $date_updated_at = null,
    ): self {
        $obj = new self;

        null !== $context && $obj['context'] = $context;
        null !== $date_joined_at && $obj['date_joined_at'] = $date_joined_at;
        null !== $date_left_at && $obj['date_left_at'] = $date_left_at;
        null !== $date_updated_at && $obj['date_updated_at'] = $date_updated_at;

        return $obj;
    }

    /**
     * Filter room participants based on the context.
     */
    public function withContext(string $context): self
    {
        $obj = clone $this;
        $obj['context'] = $context;

        return $obj;
    }

    /**
     * @param DateJoinedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateJoinedAt
     */
    public function withDateJoinedAt(DateJoinedAt|array $dateJoinedAt): self
    {
        $obj = clone $this;
        $obj['date_joined_at'] = $dateJoinedAt;

        return $obj;
    }

    /**
     * @param DateLeftAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateLeftAt
     */
    public function withDateLeftAt(DateLeftAt|array $dateLeftAt): self
    {
        $obj = clone $this;
        $obj['date_left_at'] = $dateLeftAt;

        return $obj;
    }

    /**
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateUpdatedAt
     */
    public function withDateUpdatedAt(DateUpdatedAt|array $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj['date_updated_at'] = $dateUpdatedAt;

        return $obj;
    }
}
