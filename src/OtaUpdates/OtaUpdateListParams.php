<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter;
use Telnyx\OtaUpdates\OtaUpdateListParams\Page;

/**
 * List OTA updates.
 *
 * @see Telnyx\Services\OtaUpdatesService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\OtaUpdates\OtaUpdateListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\OtaUpdates\OtaUpdateListParams\Page
 *
 * @phpstan-type OtaUpdateListParamsShape = array{
 *   filter?: null|Filter|FilterShape, page?: null|Page|PageShape
 * }
 */
final class OtaUpdateListParams implements BaseModel
{
    /** @use SdkModel<OtaUpdateListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
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
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type].
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
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
