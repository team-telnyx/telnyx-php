<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update WABA settings.
 *
 * @see Telnyx\Services\Whatsapp\BusinessAccounts\SettingsService::update()
 *
 * @phpstan-type SettingUpdateParamsShape = array{
 *   name?: string|null,
 *   timezone?: string|null,
 *   webhookEnabled?: bool|null,
 *   webhookEvents?: list<string>|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class SettingUpdateParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $name;

    /**
     * IANA timezone identifier.
     */
    #[Optional]
    public ?string $timezone;

    /**
     * Enable/disable receiving Whatsapp events.
     */
    #[Optional('webhook_enabled')]
    public ?bool $webhookEnabled;

    /** @var list<string>|null $webhookEvents */
    #[Optional('webhook_events', list: 'string')]
    public ?array $webhookEvents;

    /**
     * Failover URL to send Whatsapp events.
     */
    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    /**
     * URL to send Whatsapp events.
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
        ?string $name = null,
        ?string $timezone = null,
        ?bool $webhookEnabled = null,
        ?array $webhookEvents = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $timezone && $self['timezone'] = $timezone;
        null !== $webhookEnabled && $self['webhookEnabled'] = $webhookEnabled;
        null !== $webhookEvents && $self['webhookEvents'] = $webhookEvents;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * IANA timezone identifier.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

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
     * Failover URL to send Whatsapp events.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * URL to send Whatsapp events.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
