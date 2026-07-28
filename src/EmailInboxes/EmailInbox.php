<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\EmailInbox\RecordType;
use Telnyx\EmailInboxes\EmailInbox\Status;

/**
 * @phpstan-type EmailInboxShape = array{
 *   id: string,
 *   address: string,
 *   createdAt: \DateTimeInterface,
 *   domain: string,
 *   domainID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   settings: array<string,mixed>,
 *   status: Status|value-of<Status>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class EmailInbox implements BaseModel
{
    /** @use SdkModel<EmailInboxShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $address;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Domain name used by the inbox address.
     */
    #[Required]
    public string $domain;

    #[Required('domain_id')]
    public string $domainID;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /** @var array<string,mixed> $settings */
    #[Required(map: 'mixed')]
    public array $settings;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new EmailInbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailInbox::with(
     *   id: ...,
     *   address: ...,
     *   createdAt: ...,
     *   domain: ...,
     *   domainID: ...,
     *   recordType: ...,
     *   settings: ...,
     *   status: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailInbox)
     *   ->withID(...)
     *   ->withAddress(...)
     *   ->withCreatedAt(...)
     *   ->withDomain(...)
     *   ->withDomainID(...)
     *   ->withRecordType(...)
     *   ->withSettings(...)
     *   ->withStatus(...)
     *   ->withUpdatedAt(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param array<string,mixed> $settings
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $address,
        \DateTimeInterface $createdAt,
        string $domain,
        string $domainID,
        RecordType|string $recordType,
        array $settings,
        Status|string $status,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['address'] = $address;
        $self['createdAt'] = $createdAt;
        $self['domain'] = $domain;
        $self['domainID'] = $domainID;
        $self['recordType'] = $recordType;
        $self['settings'] = $settings;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Domain name used by the inbox address.
     */
    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

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

    /**
     * @param array<string,mixed> $settings
     */
    public function withSettings(array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
