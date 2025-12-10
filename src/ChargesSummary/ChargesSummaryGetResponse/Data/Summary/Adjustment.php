<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdjustmentShape = array{
 *   amount: string, description: string, eventDate: string
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
    #[Required('event_date')]
    public string $eventDate;

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
        string $eventDate
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['description'] = $description;
        $self['eventDate'] = $eventDate;

        return $self;
    }

    /**
     * Adjustment amount as decimal string.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Description of the adjustment.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Date when the adjustment occurred.
     */
    public function withEventDate(string $eventDate): self
    {
        $self = clone $this;
        $self['eventDate'] = $eventDate;

        return $self;
    }
}
