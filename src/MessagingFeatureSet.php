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
 *   domesticTwoWay: bool, internationalInbound: bool, internationalOutbound: bool
 * }
 */
final class MessagingFeatureSet implements BaseModel
{
    /** @use SdkModel<MessagingFeatureSetShape> */
    use SdkModel;

    /**
     * Send messages to and receive messages from numbers in the same country.
     */
    #[Required('domestic_two_way')]
    public bool $domesticTwoWay;

    /**
     * Receive messages from numbers in other countries.
     */
    #[Required('international_inbound')]
    public bool $internationalInbound;

    /**
     * Send messages to numbers in other countries.
     */
    #[Required('international_outbound')]
    public bool $internationalOutbound;

    /**
     * `new MessagingFeatureSet()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingFeatureSet::with(
     *   domesticTwoWay: ..., internationalInbound: ..., internationalOutbound: ...
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
        bool $domesticTwoWay,
        bool $internationalInbound,
        bool $internationalOutbound,
    ): self {
        $obj = new self;

        $obj['domesticTwoWay'] = $domesticTwoWay;
        $obj['internationalInbound'] = $internationalInbound;
        $obj['internationalOutbound'] = $internationalOutbound;

        return $obj;
    }

    /**
     * Send messages to and receive messages from numbers in the same country.
     */
    public function withDomesticTwoWay(bool $domesticTwoWay): self
    {
        $obj = clone $this;
        $obj['domesticTwoWay'] = $domesticTwoWay;

        return $obj;
    }

    /**
     * Receive messages from numbers in other countries.
     */
    public function withInternationalInbound(bool $internationalInbound): self
    {
        $obj = clone $this;
        $obj['internationalInbound'] = $internationalInbound;

        return $obj;
    }

    /**
     * Send messages to numbers in other countries.
     */
    public function withInternationalOutbound(bool $internationalOutbound): self
    {
        $obj = clone $this;
        $obj['internationalOutbound'] = $internationalOutbound;

        return $obj;
    }
}
