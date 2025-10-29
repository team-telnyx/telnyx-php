<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingSettingsShape = array{
 *   defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
 * }
 */
final class MessagingSettings implements BaseModel
{
    /** @use SdkModel<MessagingSettingsShape> */
    use SdkModel;

    /**
     * Default Messaging Profile used for messaging exchanges with your assistant. This will be created automatically on assistant creation.
     */
    #[Api('default_messaging_profile_id', optional: true)]
    public ?string $defaultMessagingProfileID;

    /**
     * The URL where webhooks related to delivery statused for assistant messages will be sent.
     */
    #[Api('delivery_status_webhook_url', optional: true)]
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
        ?string $defaultMessagingProfileID = null,
        ?string $deliveryStatusWebhookURL = null,
    ): self {
        $obj = new self;

        null !== $defaultMessagingProfileID && $obj->defaultMessagingProfileID = $defaultMessagingProfileID;
        null !== $deliveryStatusWebhookURL && $obj->deliveryStatusWebhookURL = $deliveryStatusWebhookURL;

        return $obj;
    }

    /**
     * Default Messaging Profile used for messaging exchanges with your assistant. This will be created automatically on assistant creation.
     */
    public function withDefaultMessagingProfileID(
        string $defaultMessagingProfileID
    ): self {
        $obj = clone $this;
        $obj->defaultMessagingProfileID = $defaultMessagingProfileID;

        return $obj;
    }

    /**
     * The URL where webhooks related to delivery statused for assistant messages will be sent.
     */
    public function withDeliveryStatusWebhookURL(
        string $deliveryStatusWebhookURL
    ): self {
        $obj = clone $this;
        $obj->deliveryStatusWebhookURL = $deliveryStatusWebhookURL;

        return $obj;
    }
}
