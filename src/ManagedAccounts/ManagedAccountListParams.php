<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Page;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Sort;

/**
 * Lists the accounts managed by the current user. Users need to be explictly approved by Telnyx in order to become manager accounts.
 *
 * @see Telnyx\Services\ManagedAccountsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Page
 *
 * @phpstan-type ManagedAccountListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   includeCancelledAccounts?: bool|null,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class ManagedAccountListParams implements BaseModel
{
    /** @use SdkModel<ManagedAccountListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Specifies if cancelled accounts should be included in the results.
     */
    #[Optional]
    public ?bool $includeCancelledAccounts;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>email</code>: sorts the result by the
     *     <code>email</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-email</code>: sorts the result by the
     *     <code>email</code> field in descending order.
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
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?bool $includeCancelledAccounts = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $includeCancelledAccounts && $self['includeCancelledAccounts'] = $includeCancelledAccounts;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Specifies if cancelled accounts should be included in the results.
     */
    public function withIncludeCancelledAccounts(
        bool $includeCancelledAccounts
    ): self {
        $self = clone $this;
        $self['includeCancelledAccounts'] = $includeCancelledAccounts;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|PageShape $page
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
     *     <code>email</code>: sorts the result by the
     *     <code>email</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-email</code>: sorts the result by the
     *     <code>email</code> field in descending order.
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
