<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional]
    public ?string $gte;

    /**
     * Return only webhook_deliveries whose delivery started earlier than or at given ISO 8601 datetime.
     */
    #[Optional]
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
        $self = new self;

        null !== $gte && $self['gte'] = $gte;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * Return only webhook_deliveries whose delivery started later than or at given ISO 8601 datetime.
     */
    public function withGte(string $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * Return only webhook_deliveries whose delivery started earlier than or at given ISO 8601 datetime.
     */
    public function withLte(string $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
