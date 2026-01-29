<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocServiceDocument\AvScanStatus;
use Telnyx\Documents\DocServiceDocument\Size;
use Telnyx\Documents\DocServiceDocument\Status;

/**
 * @phpstan-import-type SizeShape from \Telnyx\Documents\DocServiceDocument\Size
 *
 * @phpstan-type DocServiceDocumentShape = array{
 *   id?: string|null,
 *   avScanStatus?: null|AvScanStatus|value-of<AvScanStatus>,
 *   contentType?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   filename?: string|null,
 *   recordType?: string|null,
 *   sha256?: string|null,
 *   size?: null|Size|SizeShape,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: string|null,
 * }
 */
final class DocServiceDocument implements BaseModel
{
    /** @use SdkModel<DocServiceDocumentShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The antivirus scan status of the document.
     *
     * @var value-of<AvScanStatus>|null $avScanStatus
     */
    #[Optional('av_scan_status', enum: AvScanStatus::class)]
    public ?string $avScanStatus;

    /**
     * The document's content_type.
     */
    #[Optional('content_type')]
    public ?string $contentType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Optional reference string for customer tracking.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * The filename of the document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The document's SHA256 hash provided for optional verification purposes.
     */
    #[Optional]
    public ?string $sha256;

    /**
     * Indicates the document's filesize.
     */
    #[Optional]
    public ?Size $size;

    /**
     * Indicates the current document reviewing status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

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
     *
     * @param AvScanStatus|value-of<AvScanStatus>|null $avScanStatus
     * @param Size|SizeShape|null $size
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        AvScanStatus|string|null $avScanStatus = null,
        ?string $contentType = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?string $filename = null,
        ?string $recordType = null,
        ?string $sha256 = null,
        Size|array|null $size = null,
        Status|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avScanStatus && $self['avScanStatus'] = $avScanStatus;
        null !== $contentType && $self['contentType'] = $contentType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $filename && $self['filename'] = $filename;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sha256 && $self['sha256'] = $sha256;
        null !== $size && $self['size'] = $size;
        null !== $status && $self['status'] = $status;
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
     * The antivirus scan status of the document.
     *
     * @param AvScanStatus|value-of<AvScanStatus> $avScanStatus
     */
    public function withAvScanStatus(AvScanStatus|string $avScanStatus): self
    {
        $self = clone $this;
        $self['avScanStatus'] = $avScanStatus;

        return $self;
    }

    /**
     * The document's content_type.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

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
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * The filename of the document.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

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
     * The document's SHA256 hash provided for optional verification purposes.
     */
    public function withSha256(string $sha256): self
    {
        $self = clone $this;
        $self['sha256'] = $sha256;

        return $self;
    }

    /**
     * Indicates the document's filesize.
     *
     * @param Size|SizeShape $size
     */
    public function withSize(Size|array $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * Indicates the current document reviewing status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

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
