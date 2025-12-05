<?php

declare(strict_types=1);

namespace Telnyx\CallEvents;

use Telnyx\CallEvents\CallEventListParams\Filter;
use Telnyx\CallEvents\CallEventListParams\Filter\ApplicationName;
use Telnyx\CallEvents\CallEventListParams\Filter\OccurredAt;
use Telnyx\CallEvents\CallEventListParams\Filter\Product;
use Telnyx\CallEvents\CallEventListParams\Filter\Status;
use Telnyx\CallEvents\CallEventListParams\Filter\Type;
use Telnyx\CallEvents\CallEventListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filters call events by given filter parameters. Events are ordered by `occurred_at`. If filter for `leg_id` or `application_session_id` is not present, it only filters events from the last 24 hours.
 *
 * **Note**: Only one `filter[occurred_at]` can be passed.
 *
 * @see Telnyx\Services\CallEventsService::list()
 *
 * @phpstan-type CallEventListParamsShape = array{
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
 * }
 */
final class CallEventListParams implements BaseModel
{
    /** @use SdkModel<CallEventListParamsShape> */
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
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

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
}
