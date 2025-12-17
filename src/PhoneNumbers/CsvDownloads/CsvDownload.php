<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownload\Status;

/**
 * @phpstan-type CsvDownloadShape = array{
 *   id?: string|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   url?: string|null,
 * }
 */
final class CsvDownload implements BaseModel
{
    /** @use SdkModel<CsvDownloadShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Indicates the completion level of the CSV report. Only complete CSV download requests will be able to be retrieved.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The URL at which the CSV file can be retrieved.
     */
    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $url && $self['url'] = $url;

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
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Indicates the completion level of the CSV report. Only complete CSV download requests will be able to be retrieved.
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
     * The URL at which the CSV file can be retrieved.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
