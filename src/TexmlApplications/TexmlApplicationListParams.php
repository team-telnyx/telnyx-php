<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Page;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;

/**
 * Returns a list of your TeXML Applications.
 *
 * @see Telnyx\Services\TexmlApplicationsService::list()
 *
 * @phpstan-type TexmlApplicationListParamsShape = array{
 *   filter?: Filter|array{
 *     friendlyName?: string|null, outboundVoiceProfileID?: string|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class TexmlApplicationListParams implements BaseModel
{
    /** @use SdkModel<TexmlApplicationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>friendly_name</code>: sorts the result by the
     *     <code>friendly_name</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-friendly_name</code>: sorts the result by the
     *     <code>friendly_name</code> field in descending order.
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
     *   friendlyName?: string|null, outboundVoiceProfileID?: string|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name].
     *
     * @param Filter|array{
     *   friendlyName?: string|null, outboundVoiceProfileID?: string|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>friendly_name</code>: sorts the result by the
     *     <code>friendly_name</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-friendly_name</code>: sorts the result by the
     *     <code>friendly_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
