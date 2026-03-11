<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   timezone?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookEnabled?: bool|null,
 *   webhookEvents?: list<string>|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Internal ID of Whatsapp business account.
     */
    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $name;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?string $timezone;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Enable/disable receiving Whatsapp events.
     */
    #[Optional('webhook_enabled')]
    public ?bool $webhookEnabled;

    /** @var list<string>|null $webhookEvents */
    #[Optional('webhook_events', list: 'string')]
    public ?array $webhookEvents;

    /**
     * Failover URL to receive Whatsapp events.
     */
    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    /**
     * URL to receive Whatsapp events.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $webhookEvents
     */
    public static function with(
        ?string $id = null,
        ?string $name = null,
        ?string $recordType = null,
        ?string $timezone = null,
        ?\DateTimeInterface $updatedAt = null,
        ?bool $webhookEnabled = null,
        ?array $webhookEvents = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $timezone && $self['timezone'] = $timezone;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookEnabled && $self['webhookEnabled'] = $webhookEnabled;
        null !== $webhookEvents && $self['webhookEvents'] = $webhookEvents;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Internal ID of Whatsapp business account.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Enable/disable receiving Whatsapp events.
     */
    public function withWebhookEnabled(bool $webhookEnabled): self
    {
        $self = clone $this;
        $self['webhookEnabled'] = $webhookEnabled;

        return $self;
    }

    /**
     * @param list<string> $webhookEvents
     */
    public function withWebhookEvents(array $webhookEvents): self
    {
        $self = clone $this;
        $self['webhookEvents'] = $webhookEvents;

        return $self;
    }

    /**
     * Failover URL to receive Whatsapp events.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * URL to receive Whatsapp events.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
