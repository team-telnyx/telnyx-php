<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The set of features available for a specific messaging use case (SMS or MMS). Features
 * can vary depending on the characteristics the phone number, as well as its current
 * product configuration.
 *
 * @phpstan-type MessagingFeatureSetShape = array{
 *   domestic_two_way: bool,
 *   international_inbound: bool,
 *   international_outbound: bool,
 * }
 */
final class MessagingFeatureSet implements BaseModel
{
    /** @use SdkModel<MessagingFeatureSetShape> */
    use SdkModel;

    /**
     * Send messages to and receive messages from numbers in the same country.
     */
    #[Required]
    public bool $domestic_two_way;

    /**
     * Receive messages from numbers in other countries.
     */
    #[Required]
    public bool $international_inbound;

    /**
     * Send messages to numbers in other countries.
     */
    #[Required]
    public bool $international_outbound;

    /**
     * `new MessagingFeatureSet()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingFeatureSet::with(
     *   domestic_two_way: ..., international_inbound: ..., international_outbound: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingFeatureSet)
     *   ->withDomesticTwoWay(...)
     *   ->withInternationalInbound(...)
     *   ->withInternationalOutbound(...)
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
        bool $domestic_two_way,
        bool $international_inbound,
        bool $international_outbound,
    ): self {
        $obj = new self;

        $obj['domestic_two_way'] = $domestic_two_way;
        $obj['international_inbound'] = $international_inbound;
        $obj['international_outbound'] = $international_outbound;

        return $obj;
    }

    /**
     * Send messages to and receive messages from numbers in the same country.
     */
    public function withDomesticTwoWay(bool $domesticTwoWay): self
    {
        $obj = clone $this;
        $obj['domestic_two_way'] = $domesticTwoWay;

        return $obj;
    }

    /**
     * Receive messages from numbers in other countries.
     */
    public function withInternationalInbound(bool $internationalInbound): self
    {
        $obj = clone $this;
        $obj['international_inbound'] = $internationalInbound;

        return $obj;
    }

    /**
     * Send messages to numbers in other countries.
     */
    public function withInternationalOutbound(bool $internationalOutbound): self
    {
        $obj = clone $this;
        $obj['international_outbound'] = $internationalOutbound;

        return $obj;
    }
}
