<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DocumentLinkListParams); // set properties as needed
 * $client->documentLinks->list(...$params->toArray());
 * ```
 * List all documents links ordered by created_at descending.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->documentLinks->list(...$params->toArray());`
 *
 * @see Telnyx\DocumentLinks->list
 *
 * @phpstan-type document_link_list_params = array{filter?: Filter, page?: Page}
 */
final class DocumentLinkListParams implements BaseModel
{
    /** @use SdkModel<document_link_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     */
    public static function with(?Filter $filter = null, ?Page $page = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
