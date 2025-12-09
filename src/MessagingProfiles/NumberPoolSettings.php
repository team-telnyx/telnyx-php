<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   longCodeWeight: float,
 *   skipUnhealthy: bool,
 *   tollFreeWeight: float,
 *   geomatch?: bool|null,
 *   stickySender?: bool|null,
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
    #[Required('long_code_weight')]
    public float $longCodeWeight;

    /**
     * If set to true all unhealthy numbers will be automatically excluded from the pool.
     * Health metrics per number are calculated on a regular basis, taking into account the deliverability
     * rate and the amount of messages marked as spam by upstream carriers.
     * Numbers with a deliverability rate below 25% or spam ratio over 75% will be considered unhealthy.
     */
    #[Required('skip_unhealthy')]
    public bool $skipUnhealthy;

    /**
     * Defines the probability weight for a Toll Free number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100. Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    #[Required('toll_free_weight')]
    public float $tollFreeWeight;

    /**
     * If set to true, Number Pool will try to choose a sending number with the same area code as the destination
     * number. If there are no such numbers available, a nunber with a different area code will be chosen. Currently
     * only NANP numbers are supported.
     */
    #[Optional]
    public ?bool $geomatch;

    /**
     * If set to true, Number Pool will try to choose the same sending number for all messages to a particular
     * recipient. If the sending number becomes unhealthy and `skip_unhealthy` is set to true, a new
     * number will be chosen.
     */
    #[Optional('sticky_sender')]
    public ?bool $stickySender;

    /**
     * `new NumberPoolSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberPoolSettings::with(
     *   longCodeWeight: ..., skipUnhealthy: ..., tollFreeWeight: ...
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
        float $longCodeWeight,
        bool $skipUnhealthy,
        float $tollFreeWeight,
        ?bool $geomatch = null,
        ?bool $stickySender = null,
    ): self {
        $self = new self;

        $self['longCodeWeight'] = $longCodeWeight;
        $self['skipUnhealthy'] = $skipUnhealthy;
        $self['tollFreeWeight'] = $tollFreeWeight;

        null !== $geomatch && $self['geomatch'] = $geomatch;
        null !== $stickySender && $self['stickySender'] = $stickySender;

        return $self;
    }

    /**
     * Defines the probability weight for a Long Code number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100.  Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    public function withLongCodeWeight(float $longCodeWeight): self
    {
        $self = clone $this;
        $self['longCodeWeight'] = $longCodeWeight;

        return $self;
    }

    /**
     * If set to true all unhealthy numbers will be automatically excluded from the pool.
     * Health metrics per number are calculated on a regular basis, taking into account the deliverability
     * rate and the amount of messages marked as spam by upstream carriers.
     * Numbers with a deliverability rate below 25% or spam ratio over 75% will be considered unhealthy.
     */
    public function withSkipUnhealthy(bool $skipUnhealthy): self
    {
        $self = clone $this;
        $self['skipUnhealthy'] = $skipUnhealthy;

        return $self;
    }

    /**
     * Defines the probability weight for a Toll Free number to be selected when sending a message.
     * The higher the weight the higher the probability. The sum of the weights for all number types
     * does not necessarily need to add to 100. Weight must be a non-negative number, and when equal
     * to zero it will remove the number type from the pool.
     */
    public function withTollFreeWeight(float $tollFreeWeight): self
    {
        $self = clone $this;
        $self['tollFreeWeight'] = $tollFreeWeight;

        return $self;
    }

    /**
     * If set to true, Number Pool will try to choose a sending number with the same area code as the destination
     * number. If there are no such numbers available, a nunber with a different area code will be chosen. Currently
     * only NANP numbers are supported.
     */
    public function withGeomatch(bool $geomatch): self
    {
        $self = clone $this;
        $self['geomatch'] = $geomatch;

        return $self;
    }

    /**
     * If set to true, Number Pool will try to choose the same sending number for all messages to a particular
     * recipient. If the sending number becomes unhealthy and `skip_unhealthy` is set to true, a new
     * number will be chosen.
     */
    public function withStickySender(bool $stickySender): self
    {
        $self = clone $this;
        $self['stickySender'] = $stickySender;

        return $self;
    }
}
