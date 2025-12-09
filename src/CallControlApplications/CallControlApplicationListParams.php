<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\ApplicationName;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\OccurredAt;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Product;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Status;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Type;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Page;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Sort;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return a list of call control applications.
 *
 * @see Telnyx\Services\CallControlApplicationsService::list()
 *
 * @phpstan-type CallControlApplicationListParamsShape = array{
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
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class CallControlApplicationListParams implements BaseModel
{
    /** @use SdkModel<CallControlApplicationListParamsShape> */
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
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

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
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

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
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
