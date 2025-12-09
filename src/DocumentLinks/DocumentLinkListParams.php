<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListParams\Page;

/**
 * List all documents links ordered by created_at descending.
 *
 * @see Telnyx\Services\DocumentLinksService::list()
 *
 * @phpstan-type DocumentLinkListParamsShape = array{
 *   filter?: Filter|array{
 *     linkedRecordType?: string|null, linkedResourceID?: string|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class DocumentLinkListParams implements BaseModel
{
    /** @use SdkModel<DocumentLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
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
     * @param Filter|array{
     *   linkedRecordType?: string|null, linkedResourceID?: string|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
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
     * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
     *
     * @param Filter|array{
     *   linkedRecordType?: string|null, linkedResourceID?: string|null
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
}
