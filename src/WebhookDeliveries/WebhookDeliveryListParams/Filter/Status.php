<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status\Eq;

/**
 * @phpstan-type StatusShape = array{eq?: value-of<Eq>|null}
 */
final class Status implements BaseModel
{
    /** @use SdkModel<StatusShape> */
    use SdkModel;

    /**
     * Return only webhook_deliveries matching the given `status`.
     *
     * @var value-of<Eq>|null $eq
     */
    #[Optional(enum: Eq::class)]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Eq|value-of<Eq> $eq
     */
    public static function with(Eq|string|null $eq = null): self
    {
        $obj = new self;

        null !== $eq && $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * Return only webhook_deliveries matching the given `status`.
     *
     * @param Eq|value-of<Eq> $eq
     */
    public function withEq(Eq|string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
