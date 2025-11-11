<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocServiceDocument\Size;
use Telnyx\Documents\DocServiceDocument\Status;

/**
 * @phpstan-type DocServiceDocumentShape = array{
 *   id?: string|null,
 *   content_type?: string|null,
 *   created_at?: string|null,
 *   customer_reference?: string|null,
 *   filename?: string|null,
 *   record_type?: string|null,
 *   sha256?: string|null,
 *   size?: Size|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: string|null,
 * }
 */
final class DocServiceDocument implements BaseModel
{
    /** @use SdkModel<DocServiceDocumentShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The document's content_type.
     */
    #[Api(optional: true)]
    public ?string $content_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Optional reference string for customer tracking.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * The filename of the document.
     */
    #[Api(optional: true)]
    public ?string $filename;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The document's SHA256 hash provided for optional verification purposes.
     */
    #[Api(optional: true)]
    public ?string $sha256;

    /**
     * Indicates the document's filesize.
     */
    #[Api(optional: true)]
    public ?Size $size;

    /**
     * Indicates the current document reviewing status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $content_type = null,
        ?string $created_at = null,
        ?string $customer_reference = null,
        ?string $filename = null,
        ?string $record_type = null,
        ?string $sha256 = null,
        ?Size $size = null,
        Status|string|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $content_type && $obj->content_type = $content_type;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $filename && $obj->filename = $filename;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $sha256 && $obj->sha256 = $sha256;
        null !== $size && $obj->size = $size;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The document's content_type.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->content_type = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * The filename of the document.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * The document's SHA256 hash provided for optional verification purposes.
     */
    public function withSha256(string $sha256): self
    {
        $obj = clone $this;
        $obj->sha256 = $sha256;

        return $obj;
    }

    /**
     * Indicates the document's filesize.
     */
    public function withSize(Size $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    /**
     * Indicates the current document reviewing status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
