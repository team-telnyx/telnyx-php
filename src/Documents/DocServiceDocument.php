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
 *   av_scan_status?: value-of<AvScanStatus>|null,
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
    #[Optional]
    public ?string $id;

    /**
     * The antivirus scan status of the document.
     *
     * @var value-of<AvScanStatus>|null $av_scan_status
     */
    #[Optional(enum: AvScanStatus::class)]
    public ?string $av_scan_status;

    /**
     * The document's content_type.
     */
    #[Optional]
    public ?string $content_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * Optional reference string for customer tracking.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * The filename of the document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

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
    #[Optional]
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
     * @param AvScanStatus|value-of<AvScanStatus> $av_scan_status
     * @param Size|array{amount?: int|null, unit?: string|null} $size
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        AvScanStatus|string|null $av_scan_status = null,
        ?string $content_type = null,
        ?string $created_at = null,
        ?string $customer_reference = null,
        ?string $filename = null,
        ?string $record_type = null,
        ?string $sha256 = null,
        Size|array|null $size = null,
        Status|string|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $av_scan_status && $obj['av_scan_status'] = $av_scan_status;
        null !== $content_type && $obj['content_type'] = $content_type;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $filename && $obj['filename'] = $filename;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sha256 && $obj['sha256'] = $sha256;
        null !== $size && $obj['size'] = $size;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['av_scan_status'] = $avScanStatus;

        return $obj;
    }

    /**
     * The document's content_type.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj['content_type'] = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

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
        $obj['record_type'] = $recordType;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
