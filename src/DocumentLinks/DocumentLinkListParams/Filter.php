<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks\DocumentLinkListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
 *
 * @phpstan-type FilterShape = array{
 *   linked_record_type?: string|null, linked_resource_id?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The linked_record_type of the document to filter on.
     */
    #[Api(optional: true)]
    public ?string $linked_record_type;

    /**
     * The linked_resource_id of the document to filter on.
     */
    #[Api(optional: true)]
    public ?string $linked_resource_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $linked_record_type = null,
        ?string $linked_resource_id = null
    ): self {
        $obj = new self;

        null !== $linked_record_type && $obj->linked_record_type = $linked_record_type;
        null !== $linked_resource_id && $obj->linked_resource_id = $linked_resource_id;

        return $obj;
    }

    /**
     * The linked_record_type of the document to filter on.
     */
    public function withLinkedRecordType(string $linkedRecordType): self
    {
        $obj = clone $this;
        $obj->linked_record_type = $linkedRecordType;

        return $obj;
    }

    /**
     * The linked_resource_id of the document to filter on.
     */
    public function withLinkedResourceID(string $linkedResourceID): self
    {
        $obj = clone $this;
        $obj->linked_resource_id = $linkedResourceID;

        return $obj;
    }
}
