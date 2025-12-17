<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;

/**
 * @phpstan-type ConnectionRtcpSettingsShape = array{
 *   captureEnabled?: bool|null,
 *   port?: null|Port|value-of<Port>,
 *   reportFrequencySecs?: int|null,
 * }
 */
final class ConnectionRtcpSettings implements BaseModel
{
    /** @use SdkModel<ConnectionRtcpSettingsShape> */
    use SdkModel;

    /**
     * BETA - Enable the capture and storage of RTCP messages to create QoS reports on the Telnyx Mission Control Portal.
     */
    #[Optional('capture_enabled')]
    public ?bool $captureEnabled;

    /**
     * RTCP port by default is rtp+1, it can also be set to rtcp-mux.
     *
     * @var value-of<Port>|null $port
     */
    #[Optional(enum: Port::class)]
    public ?string $port;

    /**
     * RTCP reports are sent to customers based on the frequency set. Frequency is in seconds and it can be set to values from 5 to 3000 seconds.
     */
    #[Optional('report_frequency_secs')]
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
     * @param Port|value-of<Port>|null $port
     */
    public static function with(
        ?bool $captureEnabled = null,
        Port|string|null $port = null,
        ?int $reportFrequencySecs = null,
    ): self {
        $self = new self;

        null !== $captureEnabled && $self['captureEnabled'] = $captureEnabled;
        null !== $port && $self['port'] = $port;
        null !== $reportFrequencySecs && $self['reportFrequencySecs'] = $reportFrequencySecs;

        return $self;
    }

    /**
     * BETA - Enable the capture and storage of RTCP messages to create QoS reports on the Telnyx Mission Control Portal.
     */
    public function withCaptureEnabled(bool $captureEnabled): self
    {
        $self = clone $this;
        $self['captureEnabled'] = $captureEnabled;

        return $self;
    }

    /**
     * RTCP port by default is rtp+1, it can also be set to rtcp-mux.
     *
     * @param Port|value-of<Port> $port
     */
    public function withPort(Port|string $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }

    /**
     * RTCP reports are sent to customers based on the frequency set. Frequency is in seconds and it can be set to values from 5 to 3000 seconds.
     */
    public function withReportFrequencySecs(int $reportFrequencySecs): self
    {
        $self = clone $this;
        $self['reportFrequencySecs'] = $reportFrequencySecs;

        return $self;
    }
}
