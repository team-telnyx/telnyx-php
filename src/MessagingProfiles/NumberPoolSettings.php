<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Number Pool allows you to send messages from a pool of numbers of different types, assigning
 * weights to each type. The pool consists of all the long code and toll free numbers
 * assigned to the messaging profile.
 *
 * To disable this feature, set the object field to `null`.
 *
 * @phpstan-type NumberPoolSettingsShape = array{
 *   long_code_weight: float,
 *   skip_unhealthy: bool,
 *   toll_free_weight: float,
 *   geomatch?: bool|null,
 *   sticky_sender?: bool|null,
 * }
 */
final class NumberPoolSettings implements BaseModel
{
    /** @use SdkModel<NumberPoolSettingsShape> */
    use SdkModel;

    /**
     * Defines the probability weight for a Long Code number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100.  Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    #[Api]
    public float $long_code_weight;

    /**
     * If set to true all unhealthy numbers will be automatically excluded from the pool.
     * Health metrics per number are calculated on a regular basis, taking into account the deliverability
     * rate and the amount of messages marked as spam by upstream carriers.
     * Numbers with a deliverability rate below 25% or spam ratio over 75% will be considered unhealthy.
     */
    #[Api]
    public bool $skip_unhealthy;

    /**
     * Defines the probability weight for a Toll Free number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100. Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    #[Api]
    public float $toll_free_weight;

    /**
     * If set to true, Number Pool will try to choose a sending number with the same area code as the destination
     * number. If there are no such numbers available, a nunber with a different area code will be chosen. Currently
     * only NANP numbers are supported.
     */
    #[Api(optional: true)]
    public ?bool $geomatch;

    /**
     * If set to true, Number Pool will try to choose the same sending number for all messages to a particular
     * recipient. If the sending number becomes unhealthy and `skip_unhealthy` is set to true, a new
     * number will be chosen.
     */
    #[Api(optional: true)]
    public ?bool $sticky_sender;

    /**
     * `new NumberPoolSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberPoolSettings::with(
     *   long_code_weight: ..., skip_unhealthy: ..., toll_free_weight: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberPoolSettings)
     *   ->withLongCodeWeight(...)
     *   ->withSkipUnhealthy(...)
     *   ->withTollFreeWeight(...)
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
        float $long_code_weight,
        bool $skip_unhealthy,
        float $toll_free_weight,
        ?bool $geomatch = null,
        ?bool $sticky_sender = null,
    ): self {
        $obj = new self;

        $obj['long_code_weight'] = $long_code_weight;
        $obj['skip_unhealthy'] = $skip_unhealthy;
        $obj['toll_free_weight'] = $toll_free_weight;

        null !== $geomatch && $obj['geomatch'] = $geomatch;
        null !== $sticky_sender && $obj['sticky_sender'] = $sticky_sender;

        return $obj;
    }

    /**
     * Defines the probability weight for a Long Code number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100.  Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    public function withLongCodeWeight(float $longCodeWeight): self
    {
        $obj = clone $this;
        $obj['long_code_weight'] = $longCodeWeight;

        return $obj;
    }

    /**
     * If set to true all unhealthy numbers will be automatically excluded from the pool.
     * Health metrics per number are calculated on a regular basis, taking into account the deliverability
     * rate and the amount of messages marked as spam by upstream carriers.
     * Numbers with a deliverability rate below 25% or spam ratio over 75% will be considered unhealthy.
     */
    public function withSkipUnhealthy(bool $skipUnhealthy): self
    {
        $obj = clone $this;
        $obj['skip_unhealthy'] = $skipUnhealthy;

        return $obj;
    }

    /**
     * Defines the probability weight for a Toll Free number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100. Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    public function withTollFreeWeight(float $tollFreeWeight): self
    {
        $obj = clone $this;
        $obj['toll_free_weight'] = $tollFreeWeight;

        return $obj;
    }

    /**
     * If set to true, Number Pool will try to choose a sending number with the same area code as the destination
     * number. If there are no such numbers available, a nunber with a different area code will be chosen. Currently
     * only NANP numbers are supported.
     */
    public function withGeomatch(bool $geomatch): self
    {
        $obj = clone $this;
        $obj['geomatch'] = $geomatch;

        return $obj;
    }

    /**
     * If set to true, Number Pool will try to choose the same sending number for all messages to a particular
     * recipient. If the sending number becomes unhealthy and `skip_unhealthy` is set to true, a new
     * number will be chosen.
     */
    public function withStickySender(bool $stickySender): self
    {
        $obj = clone $this;
        $obj['sticky_sender'] = $stickySender;

        return $obj;
    }
}
