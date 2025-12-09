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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $documentID && $obj['documentID'] = $documentID;
        null !== $linkedRecordType && $obj['linkedRecordType'] = $linkedRecordType;
        null !== $linkedResourceID && $obj['linkedResourceID'] = $linkedResourceID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj['documentID'] = $documentID;

        return $obj;
    }

    /**
     * The linked resource's record type.
     */
    public function withLinkedRecordType(string $linkedRecordType): self
    {
        $obj = clone $this;
        $obj['linkedRecordType'] = $linkedRecordType;

        return $obj;
    }

    /**
     * Identifies the linked resource.
     */
    public function withLinkedResourceID(string $linkedResourceID): self
    {
        $obj = clone $this;
        $obj['linkedResourceID'] = $linkedResourceID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
