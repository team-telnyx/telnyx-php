<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\Webhooks\EmailWebhook\RecordType;

/**
 * @phpstan-type EmailWebhookShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   domainID: string,
 *   events: list<EmailWebhookEvent|value-of<EmailWebhookEvent>>,
 *   recordType: RecordType|value-of<RecordType>,
 *   updatedAt: \DateTimeInterface,
 *   url: string,
 * }
 */
final class EmailWebhook implements BaseModel
{
    /** @use SdkModel<EmailWebhookShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('domain_id')]
    public string $domainID;

    /**
     * Allowlist of event types delivered to this webhook. At least one event is required — there is no default-to-all.
     *
     * @var list<value-of<EmailWebhookEvent>> $events
     */
    #[Required(list: EmailWebhookEvent::class)]
    public array $events;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * HTTPS endpoint to deliver subscribed events to.
     */
    #[Required]
    public string $url;

    /**
     * `new EmailWebhook()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailWebhook::with(
     *   id: ...,
     *   createdAt: ...,
     *   domainID: ...,
     *   events: ...,
     *   recordType: ...,
     *   updatedAt: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailWebhook)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDomainID(...)
     *   ->withEvents(...)
     *   ->withRecordType(...)
     *   ->withUpdatedAt(...)
     *   ->withURL(...)
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
     * @param list<EmailWebhookEvent|value-of<EmailWebhookEvent>> $events
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $domainID,
        array $events,
        RecordType|string $recordType,
        \DateTimeInterface $updatedAt,
        string $url,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['domainID'] = $domainID;
        $self['events'] = $events;
        $self['recordType'] = $recordType;
        $self['updatedAt'] = $updatedAt;
        $self['url'] = $url;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * Allowlist of event types delivered to this webhook. At least one event is required — there is no default-to-all.
     *
     * @param list<EmailWebhookEvent|value-of<EmailWebhookEvent>> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * HTTPS endpoint to deliver subscribed events to.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
