<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WebhookDeliveryShape from \Telnyx\WebhookDeliveries\WebhookDelivery
 *
 * @phpstan-type WebhookDeliveryGetResponseShape = array{
 *   data?: null|WebhookDelivery|WebhookDeliveryShape
 * }
 */
final class WebhookDeliveryGetResponse implements BaseModel
{
    /** @use SdkModel<WebhookDeliveryGetResponseShape> */
    use SdkModel;

    /**
     * Record of all attempts to deliver a webhook.
     */
    #[Optional]
    public ?WebhookDelivery $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WebhookDelivery|WebhookDeliveryShape|null $data
     */
    public static function with(WebhookDelivery|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Record of all attempts to deliver a webhook.
     *
     * @param WebhookDelivery|WebhookDeliveryShape $data
     */
    public function withData(WebhookDelivery|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
