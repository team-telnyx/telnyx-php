<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Streams conversation and telephony events to a WebSocket server you host, and accepts messages injected back into the conversation. Telnyx opens the connection as a client, once per conversation. Delivery is best effort throughout: while the connection is down events are dropped rather than queued, and no socket failure is ever allowed to affect the call. Beta feature.
 *
 * @phpstan-type WebsocketSettingsShape = array{
 *   authRef?: string|null, enabled?: bool|null, url?: string|null
 * }
 */
final class WebsocketSettings implements BaseModel
{
    /** @use SdkModel<WebsocketSettingsShape> */
    use SdkModel;

    /**
     * Integration secret identifier whose value Telnyx sends as an `Authorization: Bearer <value>` header on the upgrade request. Resolved on every connection attempt, so a rotated secret is picked up by the next reconnect.
     */
    #[Optional('auth_ref')]
    public ?string $authRef;

    /**
     * Whether Telnyx opens a WebSocket to `url` for each of this assistant's conversations. Defaults to `false`.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * The `ws://` or `wss://` endpoint Telnyx connects to. Required when `enabled` is `true`. Must be externally reachable — localhost, private IP ranges and `.local` domains are rejected.
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
     */
    public static function with(
        ?string $authRef = null,
        ?bool $enabled = null,
        ?string $url = null
    ): self {
        $self = new self;

        null !== $authRef && $self['authRef'] = $authRef;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Integration secret identifier whose value Telnyx sends as an `Authorization: Bearer <value>` header on the upgrade request. Resolved on every connection attempt, so a rotated secret is picked up by the next reconnect.
     */
    public function withAuthRef(string $authRef): self
    {
        $self = clone $this;
        $self['authRef'] = $authRef;

        return $self;
    }

    /**
     * Whether Telnyx opens a WebSocket to `url` for each of this assistant's conversations. Defaults to `false`.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * The `ws://` or `wss://` endpoint Telnyx connects to. Required when `enabled` is `true`. Must be externally reachable — localhost, private IP ranges and `.local` domains are rejected.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
