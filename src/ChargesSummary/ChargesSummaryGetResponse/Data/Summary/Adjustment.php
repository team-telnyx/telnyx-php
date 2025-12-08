<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdjustmentShape = array{
 *   amount: string, description: string, event_date: \DateTimeInterface
 * }
 */
final class Adjustment implements BaseModel
{
    /** @use SdkModel<AdjustmentShape> */
    use SdkModel;

    /**
     * Adjustment amount as decimal string.
     */
    #[Required]
    public string $amount;

    /**
     * Description of the adjustment.
     */
    #[Required]
    public string $description;

    /**
     * Date when the adjustment occurred.
     */
    #[Required]
    public \DateTimeInterface $event_date;

    /**
     * `new Adjustment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Adjustment::with(amount: ..., description: ..., event_date: ...)
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
        \DateTimeInterface $event_date
    ): self {
        $obj = new self;

        $obj['amount'] = $amount;
        $obj['description'] = $description;
        $obj['event_date'] = $event_date;

        return $obj;
    }

    /**
     * Adjustment amount as decimal string.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * Description of the adjustment.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Date when the adjustment occurred.
     */
    public function withEventDate(\DateTimeInterface $eventDate): self
    {
        $obj = clone $this;
        $obj['event_date'] = $eventDate;

        return $obj;
    }
}
