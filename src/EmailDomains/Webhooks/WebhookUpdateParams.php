<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a webhook's URL and/or event subscription. A webhook is bound to its domain — `domain_id` is not mutable.
 *
 * @see Telnyx\Services\EmailDomains\WebhooksService::update()
 *
 * @phpstan-type WebhookUpdateParamsShape = array{
 *   domainID: string,
 *   events?: list<EmailWebhookEvent|value-of<EmailWebhookEvent>>|null,
 *   url?: string|null,
 * }
 */
final class WebhookUpdateParams implements BaseModel
{
    /** @use SdkModel<WebhookUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $domainID;

    /** @var list<value-of<EmailWebhookEvent>>|null $events */
    #[Optional(list: EmailWebhookEvent::class)]
    public ?array $events;

    #[Optional]
    public ?string $url;

    /**
     * `new WebhookUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookUpdateParams::with(domainID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookUpdateParams)->withDomainID(...)
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
     * @param list<EmailWebhookEvent|value-of<EmailWebhookEvent>>|null $events
     */
    public static function with(
        string $domainID,
        ?array $events = null,
        ?string $url = null
    ): self {
        $self = new self;

        $self['domainID'] = $domainID;

        null !== $events && $self['events'] = $events;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * @param list<EmailWebhookEvent|value-of<EmailWebhookEvent>> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
