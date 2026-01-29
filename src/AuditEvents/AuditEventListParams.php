<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents;

use Telnyx\AuditEvents\AuditEventListParams\Filter;
use Telnyx\AuditEvents\AuditEventListParams\Page;
use Telnyx\AuditEvents\AuditEventListParams\Sort;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a list of audit log entries. Audit logs are a best-effort, eventually consistent record of significant account-related changes.
 *
 * @see Telnyx\Services\AuditEventsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\AuditEvents\AuditEventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\AuditEvents\AuditEventListParams\Page
 *
 * @phpstan-type AuditEventListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class AuditEventListParams implements BaseModel
{
    /** @use SdkModel<AuditEventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Set the order of the results by the creation date.
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
     * Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after].
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
     * Set the order of the results by the creation date.
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
