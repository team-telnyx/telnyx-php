<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StartedAtShape = array{gte?: string|null, lte?: string|null}
 */
final class StartedAt implements BaseModel
{
    /** @use SdkModel<StartedAtShape> */
    use SdkModel;

    /**
     * Return only webhook_deliveries whose delivery started later than or at given ISO 8601 datetime.
     */
    #[Api(optional: true)]
    public ?string $gte;

    /**
     * Return only webhook_deliveries whose delivery started earlier than or at given ISO 8601 datetime.
     */
    #[Api(optional: true)]
    public ?string $lte;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $gte = null, ?string $lte = null): self
    {
        $obj = new self;

        null !== $gte && $obj['gte'] = $gte;
        null !== $lte && $obj['lte'] = $lte;

        return $obj;
    }

    /**
     * Return only webhook_deliveries whose delivery started later than or at given ISO 8601 datetime.
     */
    public function withGte(string $gte): self
    {
        $obj = clone $this;
        $obj['gte'] = $gte;

        return $obj;
    }

    /**
     * Return only webhook_deliveries whose delivery started earlier than or at given ISO 8601 datetime.
     */
    public function withLte(string $lte): self
    {
        $obj = clone $this;
        $obj['lte'] = $lte;

        return $obj;
    }
}
