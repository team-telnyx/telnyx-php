<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceListParams\Filter;
use Telnyx\Conferences\ConferenceListParams\Filter\ApplicationName;
use Telnyx\Conferences\ConferenceListParams\Filter\OccurredAt;
use Telnyx\Conferences\ConferenceListParams\Filter\Product;
use Telnyx\Conferences\ConferenceListParams\Filter\Status;
use Telnyx\Conferences\ConferenceListParams\Filter\Type;
use Telnyx\Conferences\ConferenceListParams\Page;
use Telnyx\Conferences\ConferenceListParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists conferences. Conferences are created on demand, and will expire after all participants have left the conference or after 4 hours regardless of the number of active participants. Conferences are listed in descending order by `expires_at`.
 *
 * @see Telnyx\Services\ConferencesService::list()
 *
 * @phpstan-type ConferenceListParamsShape = array{
 *   filter?: Filter|array{
 *     applicationName?: ApplicationName|null,
 *     applicationSessionID?: string|null,
 *     connectionID?: string|null,
 *     failed?: bool|null,
 *     from?: string|null,
 *     legID?: string|null,
 *     name?: string|null,
 *     occurredAt?: OccurredAt|null,
 *     outboundOutboundVoiceProfileID?: string|null,
 *     product?: value-of<Product>|null,
 *     status?: value-of<Status>|null,
 *     to?: string|null,
 *     type?: value-of<Type>|null,
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
final class ConferenceListParams implements BaseModel
{
    /** @use SdkModel<ConferenceListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status].
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
     *   applicationName?: ApplicationName|null,
     *   applicationSessionID?: string|null,
     *   connectionID?: string|null,
     *   failed?: bool|null,
     *   from?: string|null,
     *   legID?: string|null,
     *   name?: string|null,
     *   occurredAt?: OccurredAt|null,
     *   outboundOutboundVoiceProfileID?: string|null,
     *   product?: value-of<Product>|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   type?: value-of<Type>|null,
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
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status].
     *
     * @param Filter|array{
     *   applicationName?: ApplicationName|null,
     *   applicationSessionID?: string|null,
     *   connectionID?: string|null,
     *   failed?: bool|null,
     *   from?: string|null,
     *   legID?: string|null,
     *   name?: string|null,
     *   occurredAt?: OccurredAt|null,
     *   outboundOutboundVoiceProfileID?: string|null,
     *   product?: value-of<Product>|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   type?: value-of<Type>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
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
        $self = clone $this;
        $self['page'] = $page;

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
