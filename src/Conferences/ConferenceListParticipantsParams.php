<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceListParticipantsParams\Filter;
use Telnyx\Conferences\ConferenceListParticipantsParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists conference participants.
 *
 * @see Telnyx\Services\ConferencesService::listParticipants()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Conferences\ConferenceListParticipantsParams\Filter
 *
 * @phpstan-type ConferenceListParticipantsParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   region?: null|Region|value-of<Region>,
 * }
 */
final class ConferenceListParticipantsParams implements BaseModel
{
    /** @use SdkModel<ConferenceListParticipantsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering].
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Region where the conference data is located.
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param Region|value-of<Region>|null $region
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Region|string|null $region = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Region where the conference data is located.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
