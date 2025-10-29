<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdjustmentShape = array{
 *   amount: string, description: string, eventDate: \DateTimeInterface
 * }
 */
final class Adjustment implements BaseModel
{
    /** @use SdkModel<AdjustmentShape> */
    use SdkModel;

    /**
     * Adjustment amount as decimal string.
     */
    #[Api]
    public string $amount;

    /**
     * Description of the adjustment.
     */
    #[Api]
    public string $description;

    /**
     * Date when the adjustment occurred.
     */
    #[Api('event_date')]
    public \DateTimeInterface $eventDate;

    /**
     * `new Adjustment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Adjustment::with(amount: ..., description: ..., eventDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Adjustment)->withAmount(...)->withDescription(...)->withEventDate(...)
     * ```
     */
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
        string $amount,
        string $description,
        \DateTimeInterface $eventDate
    ): self {
        $obj = new self;

        $obj->amount = $amount;
        $obj->description = $description;
        $obj->eventDate = $eventDate;

        return $obj;
    }

    /**
     * Adjustment amount as decimal string.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Description of the adjustment.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Date when the adjustment occurred.
     */
    public function withEventDate(\DateTimeInterface $eventDate): self
    {
        $obj = clone $this;
        $obj->eventDate = $eventDate;

        return $obj;
    }
}
