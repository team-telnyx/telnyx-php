<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks\DocumentLinkListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   documentID?: string|null,
 *   linkedRecordType?: string|null,
 *   linkedResourceID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Identifies the associated document.
     */
    #[Optional('document_id')]
    public ?string $documentID;

    /**
     * The linked resource's record type.
     */
    #[Optional('linked_record_type')]
    public ?string $linkedRecordType;

    /**
     * Identifies the linked resource.
     */
    #[Optional('linked_resource_id')]
    public ?string $linkedResourceID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
        ?string $id = null,
        ?string $createdAt = null,
        ?string $documentID = null,
        ?string $linkedRecordType = null,
        ?string $linkedResourceID = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $documentID && $self['documentID'] = $documentID;
        null !== $linkedRecordType && $self['linkedRecordType'] = $linkedRecordType;
        null !== $linkedResourceID && $self['linkedResourceID'] = $linkedResourceID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the associated document.
     */
    public function withDocumentID(string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

        return $self;
    }

    /**
     * The linked resource's record type.
     */
    public function withLinkedRecordType(string $linkedRecordType): self
    {
        $self = clone $this;
        $self['linkedRecordType'] = $linkedRecordType;

        return $self;
    }

    /**
     * Identifies the linked resource.
     */
    public function withLinkedResourceID(string $linkedResourceID): self
    {
        $self = clone $this;
        $self['linkedResourceID'] = $linkedResourceID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
