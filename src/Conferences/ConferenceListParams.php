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
use Telnyx\Core\Attributes\Api;
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
 *     application_name?: ApplicationName|null,
 *     application_session_id?: string|null,
 *     connection_id?: string|null,
 *     failed?: bool|null,
 *     from?: string|null,
 *     leg_id?: string|null,
 *     name?: string|null,
 *     occurred_at?: OccurredAt|null,
 *     outbound_outbound_voice_profile_id?: string|null,
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
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Region where the conference data is located.
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
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
     *   application_name?: ApplicationName|null,
     *   application_session_id?: string|null,
     *   connection_id?: string|null,
     *   failed?: bool|null,
     *   from?: string|null,
     *   leg_id?: string|null,
     *   name?: string|null,
     *   occurred_at?: OccurredAt|null,
     *   outbound_outbound_voice_profile_id?: string|null,
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
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status].
     *
     * @param Filter|array{
     *   application_name?: ApplicationName|null,
     *   application_session_id?: string|null,
     *   connection_id?: string|null,
     *   failed?: bool|null,
     *   from?: string|null,
     *   leg_id?: string|null,
     *   name?: string|null,
     *   occurred_at?: OccurredAt|null,
     *   outbound_outbound_voice_profile_id?: string|null,
     *   product?: value-of<Product>|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   type?: value-of<Type>|null,
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
