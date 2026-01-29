<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookShape = array{contains?: string|null}
 */
final class Webhook implements BaseModel
{
    /** @use SdkModel<WebhookShape> */
    use SdkModel;

    /**
     * Return only webhook deliveries whose `webhook` component contains the given text.
     */
    #[Optional]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;

        return $self;
    }

    /**
     * Return only webhook deliveries whose `webhook` component contains the given text.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }
}
