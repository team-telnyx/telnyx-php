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
 * @phpstan-type DocServiceDocumentShape = array{
 *   id?: string|null,
 *   avScanStatus?: value-of<AvScanStatus>|null,
 *   contentType?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   filename?: string|null,
 *   recordType?: string|null,
 *   sha256?: string|null,
 *   size?: Size|null,
 *   status?: value-of<Status>|null,
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
     * @param AvScanStatus|value-of<AvScanStatus> $avScanStatus
     * @param Size|array{amount?: int|null, unit?: string|null} $size
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $avScanStatus && $obj['avScanStatus'] = $avScanStatus;
        null !== $contentType && $obj['contentType'] = $contentType;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $filename && $obj['filename'] = $filename;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $sha256 && $obj['sha256'] = $sha256;
        null !== $size && $obj['size'] = $size;
        null !== $status && $obj['status'] = $status;
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
     * The antivirus scan status of the document.
     *
     * @param AvScanStatus|value-of<AvScanStatus> $avScanStatus
     */
    public function withAvScanStatus(AvScanStatus|string $avScanStatus): self
    {
        $obj = clone $this;
        $obj['avScanStatus'] = $avScanStatus;

        return $obj;
    }

    /**
     * The document's content_type.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj['contentType'] = $contentType;

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
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * The filename of the document.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj['filename'] = $filename;

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
     * The document's SHA256 hash provided for optional verification purposes.
     */
    public function withSha256(string $sha256): self
    {
        $obj = clone $this;
        $obj['sha256'] = $sha256;

        return $obj;
    }

    /**
     * Indicates the document's filesize.
     *
     * @param Size|array{amount?: int|null, unit?: string|null} $size
     */
    public function withSize(Size|array $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
