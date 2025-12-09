<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceListParticipantsParams\Filter;
use Telnyx\Conferences\ConferenceListParticipantsParams\Page;
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
 * @phpstan-type ConferenceListParticipantsParamsShape = array{
 *   filter?: Filter|array{
 *     muted?: bool|null, onHold?: bool|null, whispering?: bool|null
 *   },
 *   page?: Page|array{
 *     after?: string|null,
 *     before?: string|null,
 *     limit?: int|null,
 *     number?: int|null,
 *     size?: int|null,
 *   },
 *   region?: Region|value-of<Region>,
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     * @param Filter|array{
     *   muted?: bool|null, onHold?: bool|null, whispering?: bool|null
     * } $filter
     * @param Page|array{
     *   after?: string|null,
     *   before?: string|null,
     *   limit?: int|null,
     *   number?: int|null,
     *   size?: int|null,
     * } $page
     * @param Region|value-of<Region> $region
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Region|string|null $region = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering].
     *
     * @param Filter|array{
     *   muted?: bool|null, onHold?: bool|null, whispering?: bool|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
     *
     * @param Page|array{
     *   after?: string|null,
     *   before?: string|null,
     *   limit?: int|null,
     *   number?: int|null,
     *   size?: int|null,
     * } $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Region where the conference data is located.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}
