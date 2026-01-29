<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingSettingsShape = array{
 *   conversationInactivityMinutes?: int|null,
 *   defaultMessagingProfileID?: string|null,
 *   deliveryStatusWebhookURL?: string|null,
 * }
 */
final class MessagingSettings implements BaseModel
{
    /** @use SdkModel<MessagingSettingsShape> */
    use SdkModel;

    /**
     * If more than this many minutes have passed since the last message, the assistant will start a new conversation instead of continuing the existing one.
     */
    #[Optional('conversation_inactivity_minutes')]
    public ?int $conversationInactivityMinutes;

    /**
     * Default Messaging Profile used for messaging exchanges with your assistant. This will be created automatically on assistant creation.
     */
    #[Optional('default_messaging_profile_id')]
    public ?string $defaultMessagingProfileID;

    /**
     * The URL where webhooks related to delivery statused for assistant messages will be sent.
     */
    #[Optional('delivery_status_webhook_url')]
    public ?string $deliveryStatusWebhookURL;

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
        ?int $conversationInactivityMinutes = null,
        ?string $defaultMessagingProfileID = null,
        ?string $deliveryStatusWebhookURL = null,
    ): self {
        $self = new self;

        null !== $conversationInactivityMinutes && $self['conversationInactivityMinutes'] = $conversationInactivityMinutes;
        null !== $defaultMessagingProfileID && $self['defaultMessagingProfileID'] = $defaultMessagingProfileID;
        null !== $deliveryStatusWebhookURL && $self['deliveryStatusWebhookURL'] = $deliveryStatusWebhookURL;

        return $self;
    }

    /**
     * If more than this many minutes have passed since the last message, the assistant will start a new conversation instead of continuing the existing one.
     */
    public function withConversationInactivityMinutes(
        int $conversationInactivityMinutes
    ): self {
        $self = clone $this;
        $self['conversationInactivityMinutes'] = $conversationInactivityMinutes;

        return $self;
    }

    /**
     * Default Messaging Profile used for messaging exchanges with your assistant. This will be created automatically on assistant creation.
     */
    public function withDefaultMessagingProfileID(
        string $defaultMessagingProfileID
    ): self {
        $self = clone $this;
        $self['defaultMessagingProfileID'] = $defaultMessagingProfileID;

        return $self;
    }

    /**
     * The URL where webhooks related to delivery statused for assistant messages will be sent.
     */
    public function withDeliveryStatusWebhookURL(
        string $deliveryStatusWebhookURL
    ): self {
        $self = clone $this;
        $self['deliveryStatusWebhookURL'] = $deliveryStatusWebhookURL;

        return $self;
    }
}
