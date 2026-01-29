<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The media features settings for a phone number.
 *
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
     * When enabled, Telnyx will accept RTP packets from any customer-side IP address and port, not just those to which Telnyx is sending RTP.
     */
    #[Optional('accept_any_rtp_packets_enabled')]
    public ?bool $acceptAnyRtpPacketsEnabled;

    /**
     * When RTP Auto-Adjust is enabled, the destination RTP address port will be automatically changed to match the source of the incoming RTP packets.
     */
    #[Optional('rtp_auto_adjust_enabled')]
    public ?bool $rtpAutoAdjustEnabled;

    /**
     * Controls whether Telnyx will accept a T.38 re-INVITE for this phone number. Note that Telnyx will not send a T.38 re-INVITE; this option only controls whether one will be accepted.
     */
    #[Optional('t38_fax_gateway_enabled')]
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
        ?bool $acceptAnyRtpPacketsEnabled = null,
        ?bool $rtpAutoAdjustEnabled = null,
        ?bool $t38FaxGatewayEnabled = null,
    ): self {
        $self = new self;

        null !== $acceptAnyRtpPacketsEnabled && $self['acceptAnyRtpPacketsEnabled'] = $acceptAnyRtpPacketsEnabled;
        null !== $rtpAutoAdjustEnabled && $self['rtpAutoAdjustEnabled'] = $rtpAutoAdjustEnabled;
        null !== $t38FaxGatewayEnabled && $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

        return $self;
    }

    /**
     * When enabled, Telnyx will accept RTP packets from any customer-side IP address and port, not just those to which Telnyx is sending RTP.
     */
    public function withAcceptAnyRtpPacketsEnabled(
        bool $acceptAnyRtpPacketsEnabled
    ): self {
        $self = clone $this;
        $self['acceptAnyRtpPacketsEnabled'] = $acceptAnyRtpPacketsEnabled;

        return $self;
    }

    /**
     * When RTP Auto-Adjust is enabled, the destination RTP address port will be automatically changed to match the source of the incoming RTP packets.
     */
    public function withRtpAutoAdjustEnabled(bool $rtpAutoAdjustEnabled): self
    {
        $self = clone $this;
        $self['rtpAutoAdjustEnabled'] = $rtpAutoAdjustEnabled;

        return $self;
    }

    /**
     * Controls whether Telnyx will accept a T.38 re-INVITE for this phone number. Note that Telnyx will not send a T.38 re-INVITE; this option only controls whether one will be accepted.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $self = clone $this;
        $self['t38FaxGatewayEnabled'] = $t38FaxGatewayEnabled;

        return $self;
    }
}
