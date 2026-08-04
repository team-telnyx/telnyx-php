<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventGetStatsResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Recipient-level event rates as percentages, rounded to 2 decimal places.
 *
 * @phpstan-type RatesShape = array{
 *   bounceRate: float,
 *   clickRate: float,
 *   complaintRate: float,
 *   deferredRate: float,
 *   deliveryRate: float,
 *   openRate: float,
 * }
 */
final class Rates implements BaseModel
{
    /** @use SdkModel<RatesShape> */
    use SdkModel;

    /**
     * Bounced recipients / queued recipients as a percentage.
     */
    #[Required('bounce_rate')]
    public float $bounceRate;

    /**
     * Recipients clicked / recipients opened as a percentage.
     */
    #[Required('click_rate')]
    public float $clickRate;

    /**
     * Recipients with a complaint feedback report / delivered recipients as a percentage.
     */
    #[Required('complaint_rate')]
    public float $complaintRate;

    /**
     * Deferred recipients / queued recipients as a percentage.
     */
    #[Required('deferred_rate')]
    public float $deferredRate;

    /**
     * Delivered recipients / queued recipients as a percentage.
     */
    #[Required('delivery_rate')]
    public float $deliveryRate;

    /**
     * Recipients opened / recipients delivered as a percentage.
     */
    #[Required('open_rate')]
    public float $openRate;

    /**
     * `new Rates()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Rates::with(
     *   bounceRate: ...,
     *   clickRate: ...,
     *   complaintRate: ...,
     *   deferredRate: ...,
     *   deliveryRate: ...,
     *   openRate: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Rates)
     *   ->withBounceRate(...)
     *   ->withClickRate(...)
     *   ->withComplaintRate(...)
     *   ->withDeferredRate(...)
     *   ->withDeliveryRate(...)
     *   ->withOpenRate(...)
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
        float $bounceRate,
        float $clickRate,
        float $complaintRate,
        float $deferredRate,
        float $deliveryRate,
        float $openRate,
    ): self {
        $self = new self;

        $self['bounceRate'] = $bounceRate;
        $self['clickRate'] = $clickRate;
        $self['complaintRate'] = $complaintRate;
        $self['deferredRate'] = $deferredRate;
        $self['deliveryRate'] = $deliveryRate;
        $self['openRate'] = $openRate;

        return $self;
    }

    /**
     * Bounced recipients / queued recipients as a percentage.
     */
    public function withBounceRate(float $bounceRate): self
    {
        $self = clone $this;
        $self['bounceRate'] = $bounceRate;

        return $self;
    }

    /**
     * Recipients clicked / recipients opened as a percentage.
     */
    public function withClickRate(float $clickRate): self
    {
        $self = clone $this;
        $self['clickRate'] = $clickRate;

        return $self;
    }

    /**
     * Recipients with a complaint feedback report / delivered recipients as a percentage.
     */
    public function withComplaintRate(float $complaintRate): self
    {
        $self = clone $this;
        $self['complaintRate'] = $complaintRate;

        return $self;
    }

    /**
     * Deferred recipients / queued recipients as a percentage.
     */
    public function withDeferredRate(float $deferredRate): self
    {
        $self = clone $this;
        $self['deferredRate'] = $deferredRate;

        return $self;
    }

    /**
     * Delivered recipients / queued recipients as a percentage.
     */
    public function withDeliveryRate(float $deliveryRate): self
    {
        $self = clone $this;
        $self['deliveryRate'] = $deliveryRate;

        return $self;
    }

    /**
     * Recipients opened / recipients delivered as a percentage.
     */
    public function withOpenRate(float $openRate): self
    {
        $self = clone $this;
        $self['openRate'] = $openRate;

        return $self;
    }
}
