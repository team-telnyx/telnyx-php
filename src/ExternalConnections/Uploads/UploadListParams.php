<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Page;

/**
 * Returns a list of your Upload requests for the given external connection.
 *
 * @see Telnyx\Services\ExternalConnections\UploadsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\Uploads\UploadListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ExternalConnections\Uploads\UploadListParams\Page
 *
 * @phpstan-type UploadListParamsShape = array{
 *   filter?: null|Filter|FilterShape, page?: null|Page|PageShape
 * }
 */
final class UploadListParams implements BaseModel
{
    /** @use SdkModel<UploadListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     * Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
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
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
