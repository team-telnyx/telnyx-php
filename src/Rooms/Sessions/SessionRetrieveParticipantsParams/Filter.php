<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;

use Telnyx\Core\Attributes\Optional;
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
 *   dateJoinedAt?: DateJoinedAt|null,
 *   dateLeftAt?: DateLeftAt|null,
 *   dateUpdatedAt?: DateUpdatedAt|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter room participants based on the context.
     */
    #[Optional]
    public ?string $context;

    #[Optional('date_joined_at')]
    public ?DateJoinedAt $dateJoinedAt;

    #[Optional('date_left_at')]
    public ?DateLeftAt $dateLeftAt;

    #[Optional('date_updated_at')]
    public ?DateUpdatedAt $dateUpdatedAt;

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
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateJoinedAt
     * @param DateLeftAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateLeftAt
     * @param DateUpdatedAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateUpdatedAt
     */
    public static function with(
        ?string $context = null,
        DateJoinedAt|array|null $dateJoinedAt = null,
        DateLeftAt|array|null $dateLeftAt = null,
        DateUpdatedAt|array|null $dateUpdatedAt = null,
    ): self {
        $self = new self;

        null !== $context && $self['context'] = $context;
        null !== $dateJoinedAt && $self['dateJoinedAt'] = $dateJoinedAt;
        null !== $dateLeftAt && $self['dateLeftAt'] = $dateLeftAt;
        null !== $dateUpdatedAt && $self['dateUpdatedAt'] = $dateUpdatedAt;

        return $self;
    }

    /**
     * Filter room participants based on the context.
     */
    public function withContext(string $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * @param DateJoinedAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateJoinedAt
     */
    public function withDateJoinedAt(DateJoinedAt|array $dateJoinedAt): self
    {
        $self = clone $this;
        $self['dateJoinedAt'] = $dateJoinedAt;

        return $self;
    }

    /**
     * @param DateLeftAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateLeftAt
     */
    public function withDateLeftAt(DateLeftAt|array $dateLeftAt): self
    {
        $self = clone $this;
        $self['dateLeftAt'] = $dateLeftAt;

        return $self;
    }

    /**
     * @param DateUpdatedAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateUpdatedAt
     */
    public function withDateUpdatedAt(DateUpdatedAt|array $dateUpdatedAt): self
    {
        $self = clone $this;
        $self['dateUpdatedAt'] = $dateUpdatedAt;

        return $self;
    }
}
