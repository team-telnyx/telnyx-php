<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks\DocumentLinkListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id].
 *
 * @phpstan-type FilterShape = array{
 *   linkedRecordType?: string|null, linkedResourceID?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The linked_record_type of the document to filter on.
     */
    #[Optional('linked_record_type')]
    public ?string $linkedRecordType;

    /**
     * The linked_resource_id of the document to filter on.
     */
    #[Optional('linked_resource_id')]
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
        $self = new self;

        null !== $linkedRecordType && $self['linkedRecordType'] = $linkedRecordType;
        null !== $linkedResourceID && $self['linkedResourceID'] = $linkedResourceID;

        return $self;
    }

    /**
     * The linked_record_type of the document to filter on.
     */
    public function withLinkedRecordType(string $linkedRecordType): self
    {
        $self = clone $this;
        $self['linkedRecordType'] = $linkedRecordType;

        return $self;
    }

    /**
     * The linked_resource_id of the document to filter on.
     */
    public function withLinkedResourceID(string $linkedResourceID): self
    {
        $self = clone $this;
        $self['linkedResourceID'] = $linkedResourceID;

        return $self;
    }
}
