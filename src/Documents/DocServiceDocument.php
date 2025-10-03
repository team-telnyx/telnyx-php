<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocServiceDocument\Size;
use Telnyx\Documents\DocServiceDocument\Status;

/**
 * @phpstan-type doc_service_document = array{
 *   id?: string,
 *   contentType?: string,
 *   createdAt?: string,
 *   customerReference?: string,
 *   filename?: string,
 *   recordType?: string,
 *   sha256?: string,
 *   size?: Size,
 *   status?: value-of<Status>,
 *   updatedAt?: string,
 * }
 */
final class DocServiceDocument implements BaseModel
{
    /** @use SdkModel<doc_service_document> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The document's content_type.
     */
    #[Api('content_type', optional: true)]
    public ?string $contentType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Optional reference string for customer tracking.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * The filename of the document.
     */
    #[Api(optional: true)]
    public ?string $filename;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

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
        ?string $contentType = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?string $filename = null,
        ?string $recordType = null,
        ?string $sha256 = null,
        ?Size $size = null,
        Status|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $contentType && $obj->contentType = $contentType;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $filename && $obj->filename = $filename;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $sha256 && $obj->sha256 = $sha256;
        null !== $size && $obj->size = $size;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

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
        $obj->recordType = $recordType;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
