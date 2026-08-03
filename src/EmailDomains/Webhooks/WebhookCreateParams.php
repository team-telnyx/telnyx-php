<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a webhook endpoint subscribed to a specific allowlist of event types. Both `email.*` events (published by email-api) and `email_domain.*` events (published by this service) flow through the same webhooks.
 *
 * @see Telnyx\Services\EmailDomains\WebhooksService::create()
 *
 * @phpstan-type WebhookCreateParamsShape = array{
 *   events: list<EmailWebhookEvent|value-of<EmailWebhookEvent>>, url: string
 * }
 */
final class WebhookCreateParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * At least one event type is required.
     *
     * @var list<value-of<EmailWebhookEvent>> $events
     */
    #[Required(list: EmailWebhookEvent::class)]
    public array $events;

    /**
     * HTTPS endpoint to deliver subscribed events to.
     */
    #[Required]
    public string $url;

    /**
     * `new WebhookCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateParams::with(events: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateParams)->withEvents(...)->withURL(...)
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
     */
    public static function with(array $events, string $url): self
    {
        $self = new self;

        $self['events'] = $events;
        $self['url'] = $url;

        return $self;
    }

    /**
     * At least one event type is required.
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
     * HTTPS endpoint to deliver subscribed events to.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
