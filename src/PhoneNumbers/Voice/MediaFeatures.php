<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The media features settings for a phone number.
 *
 * @phpstan-type MediaFeaturesShape = array{
 *   accept_any_rtp_packets_enabled?: bool|null,
 *   rtp_auto_adjust_enabled?: bool|null,
 *   t38_fax_gateway_enabled?: bool|null,
 * }
 */
final class MediaFeatures implements BaseModel
{
    /** @use SdkModel<MediaFeaturesShape> */
    use SdkModel;

    /**
     * When enabled, Telnyx will accept RTP packets from any customer-side IP address and port, not just those to which Telnyx is sending RTP.
     */
    #[Api(optional: true)]
    public ?bool $accept_any_rtp_packets_enabled;

    /**
     * When RTP Auto-Adjust is enabled, the destination RTP address port will be automatically changed to match the source of the incoming RTP packets.
     */
    #[Api(optional: true)]
    public ?bool $rtp_auto_adjust_enabled;

    /**
     * Controls whether Telnyx will accept a T.38 re-INVITE for this phone number. Note that Telnyx will not send a T.38 re-INVITE; this option only controls whether one will be accepted.
     */
    #[Api(optional: true)]
    public ?bool $t38_fax_gateway_enabled;

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
        ?bool $accept_any_rtp_packets_enabled = null,
        ?bool $rtp_auto_adjust_enabled = null,
        ?bool $t38_fax_gateway_enabled = null,
    ): self {
        $obj = new self;

        null !== $accept_any_rtp_packets_enabled && $obj->accept_any_rtp_packets_enabled = $accept_any_rtp_packets_enabled;
        null !== $rtp_auto_adjust_enabled && $obj->rtp_auto_adjust_enabled = $rtp_auto_adjust_enabled;
        null !== $t38_fax_gateway_enabled && $obj->t38_fax_gateway_enabled = $t38_fax_gateway_enabled;

        return $obj;
    }

    /**
     * When enabled, Telnyx will accept RTP packets from any customer-side IP address and port, not just those to which Telnyx is sending RTP.
     */
    public function withAcceptAnyRtpPacketsEnabled(
        bool $acceptAnyRtpPacketsEnabled
    ): self {
        $obj = clone $this;
        $obj->accept_any_rtp_packets_enabled = $acceptAnyRtpPacketsEnabled;

        return $obj;
    }

    /**
     * When RTP Auto-Adjust is enabled, the destination RTP address port will be automatically changed to match the source of the incoming RTP packets.
     */
    public function withRtpAutoAdjustEnabled(bool $rtpAutoAdjustEnabled): self
    {
        $obj = clone $this;
        $obj->rtp_auto_adjust_enabled = $rtpAutoAdjustEnabled;

        return $obj;
    }

    /**
     * Controls whether Telnyx will accept a T.38 re-INVITE for this phone number. Note that Telnyx will not send a T.38 re-INVITE; this option only controls whether one will be accepted.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $obj = clone $this;
        $obj->t38_fax_gateway_enabled = $t38FaxGatewayEnabled;

        return $obj;
    }
}
