<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;

/**
 * @phpstan-type ConnectionRtcpSettingsShape = array{
 *   capture_enabled?: bool|null,
 *   port?: value-of<Port>|null,
 *   report_frequency_secs?: int|null,
 * }
 */
final class ConnectionRtcpSettings implements BaseModel
{
    /** @use SdkModel<ConnectionRtcpSettingsShape> */
    use SdkModel;

    /**
     * BETA - Enable the capture and storage of RTCP messages to create QoS reports on the Telnyx Mission Control Portal.
     */
    #[Api(optional: true)]
    public ?bool $capture_enabled;

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
    #[Api(optional: true)]
    public ?int $report_frequency_secs;

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
        ?bool $capture_enabled = null,
        Port|string|null $port = null,
        ?int $report_frequency_secs = null,
    ): self {
        $obj = new self;

        null !== $capture_enabled && $obj['capture_enabled'] = $capture_enabled;
        null !== $port && $obj['port'] = $port;
        null !== $report_frequency_secs && $obj['report_frequency_secs'] = $report_frequency_secs;

        return $obj;
    }

    /**
     * BETA - Enable the capture and storage of RTCP messages to create QoS reports on the Telnyx Mission Control Portal.
     */
    public function withCaptureEnabled(bool $captureEnabled): self
    {
        $obj = clone $this;
        $obj['capture_enabled'] = $captureEnabled;

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
        $obj['report_frequency_secs'] = $reportFrequencySecs;

        return $obj;
    }
}
