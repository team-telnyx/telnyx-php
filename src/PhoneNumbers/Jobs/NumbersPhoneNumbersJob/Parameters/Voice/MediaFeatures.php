<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type MediaFeaturesShape = array{
 *   acceptAnyRtpPacketsEnabled?: bool|null,
 *   rtpAutoAdjustEnabled?: bool|null,
 *   t38FaxGatewayEnabled?: bool|null,
 * }
 */
final class MediaFeatures implements BaseModel
{
    /** @use SdkModel<MediaFeaturesShape> */
    use SdkModel;

    /**
     * Saved accept_any_rtp_packets_enabled setting.
     */
    #[Optional('accept_any_rtp_packets_enabled', nullable: true)]
    public ?bool $acceptAnyRtpPacketsEnabled;

    /**
     * Saved rtp_auto_adjust_enabled setting.
     */
    #[Optional('rtp_auto_adjust_enabled', nullable: true)]
    public ?bool $rtpAutoAdjustEnabled;

    /**
     * Saved t38_fax_gateway_enabled setting.
     */
    #[Optional('t38_fax_gateway_enabled', nullable: true)]
    public ?bool $t38FaxGatewayEnabled;

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
        bool|Omitted|null $acceptAnyRtpPacketsEnabled = Omitted::VALUE,
        bool|Omitted|null $rtpAutoAdjustEnabled = Omitted::VALUE,
        bool|Omitted|null $t38FaxGatewayEnabled = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $acceptAnyRtpPacketsEnabled && $self['acceptAnyRtpPacketsEnabled'] = $acceptAnyRtpPacketsEnabled;
        Omitted::VALUE !== $rtpAutoAdjustEnabled && $self['rtpAutoAdjustEnabled'] = $rtpAutoAdjustEnabled;
        Omitted::VALUE !== $t38FaxGatewayEnabled && $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

        return $self;
    }

    /**
     * Saved accept_any_rtp_packets_enabled setting.
     */
    public function withAcceptAnyRtpPacketsEnabled(
        ?bool $acceptAnyRtpPacketsEnabled
    ): self {
        $self = clone $this;
        $self['acceptAnyRtpPacketsEnabled'] = $acceptAnyRtpPacketsEnabled;

        return $self;
    }

    /**
     * Saved rtp_auto_adjust_enabled setting.
     */
    public function withRtpAutoAdjustEnabled(?bool $rtpAutoAdjustEnabled): self
    {
        $self = clone $this;
        $self['rtpAutoAdjustEnabled'] = $rtpAutoAdjustEnabled;

        return $self;
    }

    /**
     * Saved t38_fax_gateway_enabled setting.
     */
    public function withT38FaxGatewayEnabled(?bool $t38FaxGatewayEnabled): self
    {
        $self = clone $this;
        $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

        return $self;
    }
}
