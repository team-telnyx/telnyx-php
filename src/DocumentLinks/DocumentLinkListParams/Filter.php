<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks\DocumentLinkListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
 *
 * @phpstan-type filter_alias = array{
 *   linkedRecordType?: string, linkedResourceID?: string
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The linked_record_type of the document to filter on.
     */
    #[Api('linked_record_type', optional: true)]
    public ?string $linkedRecordType;

    /**
     * The linked_resource_id of the document to filter on.
     */
    #[Api('linked_resource_id', optional: true)]
    public ?string $linkedResourceID;

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
        ?string $linkedRecordType = null,
        ?string $linkedResourceID = null
    ): self {
        $obj = new self;

        null !== $linkedRecordType && $obj->linkedRecordType = $linkedRecordType;
        null !== $linkedResourceID && $obj->linkedResourceID = $linkedResourceID;

        return $obj;
    }

    /**
     * The linked_record_type of the document to filter on.
     */
    public function withLinkedRecordType(string $linkedRecordType): self
    {
        $obj = clone $this;
        $obj->linkedRecordType = $linkedRecordType;

        return $obj;
    }

    /**
     * The linked_resource_id of the document to filter on.
     */
    public function withLinkedResourceID(string $linkedResourceID): self
    {
        $obj = clone $this;
        $obj->linkedResourceID = $linkedResourceID;

        return $obj;
    }
}
