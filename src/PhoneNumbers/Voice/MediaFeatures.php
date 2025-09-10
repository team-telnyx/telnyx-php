<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The media features settings for a phone number.
 *
 * @phpstan-type media_features = array{
 *   acceptAnyRtpPacketsEnabled?: bool|null,
 *   rtpAutoAdjustEnabled?: bool|null,
 *   t38FaxGatewayEnabled?: bool|null,
 * }
 */
final class MediaFeatures implements BaseModel
{
    /** @use SdkModel<media_features> */
    use SdkModel;

    /**
     * When enabled, Telnyx will accept RTP packets from any customer-side IP address and port, not just those to which Telnyx is sending RTP.
     */
    #[Api('accept_any_rtp_packets_enabled', optional: true)]
    public ?bool $acceptAnyRtpPacketsEnabled;

    /**
     * When RTP Auto-Adjust is enabled, the destination RTP address port will be automatically changed to match the source of the incoming RTP packets.
     */
    #[Api('rtp_auto_adjust_enabled', optional: true)]
    public ?bool $rtpAutoAdjustEnabled;

    /**
     * Controls whether Telnyx will accept a T.38 re-INVITE for this phone number. Note that Telnyx will not send a T.38 re-INVITE; this option only controls whether one will be accepted.
     */
    #[Api('t38_fax_gateway_enabled', optional: true)]
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
        $obj = new self;

        null !== $acceptAnyRtpPacketsEnabled && $obj->acceptAnyRtpPacketsEnabled = $acceptAnyRtpPacketsEnabled;
        null !== $rtpAutoAdjustEnabled && $obj->rtpAutoAdjustEnabled = $rtpAutoAdjustEnabled;
        null !== $t38FaxGatewayEnabled && $obj->t38FaxGatewayEnabled = $t38FaxGatewayEnabled;

        return $obj;
    }

    /**
     * When enabled, Telnyx will accept RTP packets from any customer-side IP address and port, not just those to which Telnyx is sending RTP.
     */
    public function withAcceptAnyRtpPacketsEnabled(
        bool $acceptAnyRtpPacketsEnabled
    ): self {
        $obj = clone $this;
        $obj->acceptAnyRtpPacketsEnabled = $acceptAnyRtpPacketsEnabled;

        return $obj;
    }

    /**
     * When RTP Auto-Adjust is enabled, the destination RTP address port will be automatically changed to match the source of the incoming RTP packets.
     */
    public function withRtpAutoAdjustEnabled(bool $rtpAutoAdjustEnabled): self
    {
        $obj = clone $this;
        $obj->rtpAutoAdjustEnabled = $rtpAutoAdjustEnabled;

        return $obj;
    }

    /**
     * Controls whether Telnyx will accept a T.38 re-INVITE for this phone number. Note that Telnyx will not send a T.38 re-INVITE; this option only controls whether one will be accepted.
     */
    public function withT38FaxGatewayEnabled(bool $t38FaxGatewayEnabled): self
    {
        $obj = clone $this;
        $obj->t38FaxGatewayEnabled = $t38FaxGatewayEnabled;

        return $obj;
    }
}
