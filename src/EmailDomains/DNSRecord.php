<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\DNSRecord\Purpose;
use Telnyx\EmailDomains\DNSRecord\RecordType;
use Telnyx\EmailDomains\DNSRecord\Status;

/**
 * @phpstan-type DNSRecordShape = array{
 *   id: string,
 *   host: string,
 *   purpose: Purpose|value-of<Purpose>,
 *   recordType: RecordType|value-of<RecordType>,
 *   required: bool,
 *   status: Status|value-of<Status>,
 *   value: string,
 *   actualValue?: string|null,
 *   priority?: int|null,
 * }
 */
final class DNSRecord implements BaseModel
{
    /** @use SdkModel<DNSRecordShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $host;

    /** @var value-of<Purpose> $purpose */
    #[Required(enum: Purpose::class)]
    public string $purpose;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required]
    public bool $required;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public string $value;

    #[Optional('actual_value', nullable: true)]
    public ?string $actualValue;

    #[Optional(nullable: true)]
    public ?int $priority;

    /**
     * `new DNSRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DNSRecord::with(
     *   id: ...,
     *   host: ...,
     *   purpose: ...,
     *   recordType: ...,
     *   required: ...,
     *   status: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DNSRecord)
     *   ->withID(...)
     *   ->withHost(...)
     *   ->withPurpose(...)
     *   ->withRecordType(...)
     *   ->withRequired(...)
     *   ->withStatus(...)
     *   ->withValue(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Purpose|value-of<Purpose> $purpose
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $host,
        Purpose|string $purpose,
        RecordType|string $recordType,
        bool $required,
        Status|string $status,
        string $value,
        ?string $actualValue = null,
        ?int $priority = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['host'] = $host;
        $self['purpose'] = $purpose;
        $self['recordType'] = $recordType;
        $self['required'] = $required;
        $self['status'] = $status;
        $self['value'] = $value;

        null !== $actualValue && $self['actualValue'] = $actualValue;
        null !== $priority && $self['priority'] = $priority;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withHost(string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    /**
     * @param Purpose|value-of<Purpose> $purpose
     */
    public function withPurpose(Purpose|string $purpose): self
    {
        $self = clone $this;
        $self['purpose'] = $purpose;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    public function withActualValue(?string $actualValue): self
    {
        $self = clone $this;
        $self['actualValue'] = $actualValue;

        return $self;
    }

    public function withPriority(?int $priority): self
    {
        $self = clone $this;
        $self['priority'] = $priority;

        return $self;
    }
}
