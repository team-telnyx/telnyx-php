<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Webhook;

/**
 * @phpstan-type WebhookDeliveryGetResponseShape = array{data?: Data|null}
 */
final class WebhookDeliveryGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WebhookDeliveryGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Record of all attempts to deliver a webhook.
     */
    #[Api(optional: true)]
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
     * @param Data|array{
     *   id?: string|null,
     *   attempts?: list<Attempt>|null,
     *   finished_at?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   user_id?: string|null,
     *   webhook?: Webhook|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * Record of all attempts to deliver a webhook.
     *
     * @param Data|array{
     *   id?: string|null,
     *   attempts?: list<Attempt>|null,
     *   finished_at?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   user_id?: string|null,
     *   webhook?: Webhook|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
