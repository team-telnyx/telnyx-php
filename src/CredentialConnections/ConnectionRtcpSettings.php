<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;

/**
 * @phpstan-type ConnectionRtcpSettingsShape = array{
 *   captureEnabled?: bool, port?: value-of<Port>, reportFrequencySecs?: int
 * }
 */
final class ConnectionRtcpSettings implements BaseModel
{
    /** @use SdkModel<ConnectionRtcpSettingsShape> */
    use SdkModel;

    /**
     * BETA - Enable the capture and storage of RTCP messages to create QoS reports on the Telnyx Mission Control Portal.
     */
    #[Api('capture_enabled', optional: true)]
    public ?bool $captureEnabled;

    /**
     * RTCP port by default is rtp+1, it can also be set to rtcp-mux.
     *
     * @var value-of<Port>|null $port
     */
    #[Api(enum: Port::class, optional: true)]
    public ?string $port;

    /**
     * RTCP reports are sent to customers based on the frequency set. Frequency is in seconds and it can be set to values from 5 to 3000 seconds.
     */
    #[Api('report_frequency_secs', optional: true)]
    public ?int $reportFrequencySecs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Port|value-of<Port> $port
     */
    public static function with(
        ?bool $captureEnabled = null,
        Port|string|null $port = null,
        ?int $reportFrequencySecs = null,
    ): self {
        $obj = new self;

        null !== $captureEnabled && $obj->captureEnabled = $captureEnabled;
        null !== $port && $obj['port'] = $port;
        null !== $reportFrequencySecs && $obj->reportFrequencySecs = $reportFrequencySecs;

        return $obj;
    }

    /**
     * BETA - Enable the capture and storage of RTCP messages to create QoS reports on the Telnyx Mission Control Portal.
     */
    public function withCaptureEnabled(bool $captureEnabled): self
    {
        $obj = clone $this;
        $obj->captureEnabled = $captureEnabled;

        return $obj;
    }

    /**
     * RTCP port by default is rtp+1, it can also be set to rtcp-mux.
     *
     * @param Port|value-of<Port> $port
     */
    public function withPort(Port|string $port): self
    {
        $obj = clone $this;
        $obj['port'] = $port;

        return $obj;
    }

    /**
     * RTCP reports are sent to customers based on the frequency set. Frequency is in seconds and it can be set to values from 5 to 3000 seconds.
     */
    public function withReportFrequencySecs(int $reportFrequencySecs): self
    {
        $obj = clone $this;
        $obj->reportFrequencySecs = $reportFrequencySecs;

        return $obj;
    }
}
