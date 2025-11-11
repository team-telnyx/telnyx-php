<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingSettingsShape = array{
 *   default_messaging_profile_id?: string|null,
 *   delivery_status_webhook_url?: string|null,
 * }
 */
final class MessagingSettings implements BaseModel
{
    /** @use SdkModel<MessagingSettingsShape> */
    use SdkModel;

    /**
     * Default Messaging Profile used for messaging exchanges with your assistant. This will be created automatically on assistant creation.
     */
    #[Api(optional: true)]
    public ?string $default_messaging_profile_id;

    /**
     * The URL where webhooks related to delivery statused for assistant messages will be sent.
     */
    #[Api(optional: true)]
    public ?string $delivery_status_webhook_url;

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
        ?string $default_messaging_profile_id = null,
        ?string $delivery_status_webhook_url = null,
    ): self {
        $obj = new self;

        null !== $default_messaging_profile_id && $obj->default_messaging_profile_id = $default_messaging_profile_id;
        null !== $delivery_status_webhook_url && $obj->delivery_status_webhook_url = $delivery_status_webhook_url;

        return $obj;
    }

    /**
     * Default Messaging Profile used for messaging exchanges with your assistant. This will be created automatically on assistant creation.
     */
    public function withDefaultMessagingProfileID(
        string $defaultMessagingProfileID
    ): self {
        $obj = clone $this;
        $obj->default_messaging_profile_id = $defaultMessagingProfileID;

        return $obj;
    }

    /**
     * The URL where webhooks related to delivery statused for assistant messages will be sent.
     */
    public function withDeliveryStatusWebhookURL(
        string $deliveryStatusWebhookURL
    ): self {
        $obj = clone $this;
        $obj->delivery_status_webhook_url = $deliveryStatusWebhookURL;

        return $obj;
    }
}
