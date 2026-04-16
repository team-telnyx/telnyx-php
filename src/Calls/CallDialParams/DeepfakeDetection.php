<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Enables deepfake detection on the call. When enabled, audio from the remote party is streamed to a detection service that analyzes whether the voice is AI-generated. Results are delivered via the `call.deepfake_detection.result` webhook.
 *
 * @phpstan-type DeepfakeDetectionShape = array{
 *   enabled: bool, rtpTimeout?: int|null, timeout?: int|null
 * }
 */
final class DeepfakeDetection implements BaseModel
{
    /** @use SdkModel<DeepfakeDetectionShape> */
    use SdkModel;

    /**
     * Whether deepfake detection is enabled.
     */
    #[Required]
    public bool $enabled;

    /**
     * Maximum time in seconds to wait for RTP audio before timing out. If no audio is received within this window, detection stops with an error.
     */
    #[Optional('rtp_timeout')]
    public ?int $rtpTimeout;

    /**
     * Maximum time in seconds to wait for a detection result before timing out.
     */
    #[Optional]
    public ?int $timeout;

    /**
     * `new DeepfakeDetection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepfakeDetection::with(enabled: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepfakeDetection)->withEnabled(...)
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
        bool $enabled = false,
        ?int $rtpTimeout = null,
        ?int $timeout = null
    ): self {
        $self = new self;

        $self['enabled'] = $enabled;

        null !== $rtpTimeout && $self['rtpTimeout'] = $rtpTimeout;
        null !== $timeout && $self['timeout'] = $timeout;

        return $self;
    }

    /**
     * Whether deepfake detection is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Maximum time in seconds to wait for RTP audio before timing out. If no audio is received within this window, detection stops with an error.
     */
    public function withRtpTimeout(int $rtpTimeout): self
    {
        $self = clone $this;
        $self['rtpTimeout'] = $rtpTimeout;

        return $self;
    }

    /**
     * Maximum time in seconds to wait for a detection result before timing out.
     */
    public function withTimeout(int $timeout): self
    {
        $self = clone $this;
        $self['timeout'] = $timeout;

        return $self;
    }
}
