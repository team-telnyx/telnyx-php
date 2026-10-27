<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * MM7 settings for inbound messages.
 *
 * @phpstan-type Mm7MetadataShape = array{
 *   mm7FailoverWebhookURL?: string|null, mm7WebhookURL?: string|null
 * }
 */
final class Mm7Metadata implements BaseModel
{
    /** @use SdkModel<Mm7MetadataShape> */
    use SdkModel;

    /**
     * Failover webhook URL to receive inbound MM7 traffic.
     */
    #[Optional('mm7_failover_webhook_url')]
    public ?string $mm7FailoverWebhookURL;

    /**
     * Webhook URL to receive inbound MM7 traffic.
     */
    #[Optional('mm7_webhook_url')]
    public ?string $mm7WebhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $mm7FailoverWebhookURL = null,
        ?string $mm7WebhookURL = null
    ): self {
        $self = new self;

        null !== $mm7FailoverWebhookURL && $self['mm7FailoverWebhookURL'] = $mm7FailoverWebhookURL;
        null !== $mm7WebhookURL && $self['mm7WebhookURL'] = $mm7WebhookURL;

        return $self;
    }

    /**
     * Failover webhook URL to receive inbound MM7 traffic.
     */
    public function withMm7FailoverWebhookURL(
        string $mm7FailoverWebhookURL
    ): self {
        $self = clone $this;
        $self['mm7FailoverWebhookURL'] = $mm7FailoverWebhookURL;

        return $self;
    }

    /**
     * Webhook URL to receive inbound MM7 traffic.
     */
    public function withMm7WebhookURL(string $mm7WebhookURL): self
    {
        $self = clone $this;
        $self['mm7WebhookURL'] = $mm7WebhookURL;

        return $self;
    }
}
