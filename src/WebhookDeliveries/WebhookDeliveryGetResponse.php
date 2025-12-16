<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data
 *
 * @phpstan-type WebhookDeliveryGetResponseShape = array{
 *   data?: null|Data|DataShape
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
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DataShape $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Record of all attempts to deliver a webhook.
     *
     * @param DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
