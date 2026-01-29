<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
 *
 * @phpstan-type JitterBufferShape = array{
 *   enableJitterBuffer?: bool|null,
 *   jitterbufferMsecMax?: int|null,
 *   jitterbufferMsecMin?: int|null,
 * }
 */
final class JitterBuffer implements BaseModel
{
    /** @use SdkModel<JitterBufferShape> */
    use SdkModel;

    /**
     * Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled.
     */
    #[Optional('enable_jitter_buffer')]
    public ?bool $enableJitterBuffer;

    /**
     * The maximum jitter buffer size in milliseconds. Must be between 40 and 400. Has no effect if enable_jitter_buffer is not true.
     */
    #[Optional('jitterbuffer_msec_max')]
    public ?int $jitterbufferMsecMax;

    /**
     * The minimum jitter buffer size in milliseconds. Must be between 40 and 400. Has no effect if enable_jitter_buffer is not true.
     */
    #[Optional('jitterbuffer_msec_min')]
    public ?int $jitterbufferMsecMin;

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
        ?bool $enableJitterBuffer = null,
        ?int $jitterbufferMsecMax = null,
        ?int $jitterbufferMsecMin = null,
    ): self {
        $self = new self;

        null !== $enableJitterBuffer && $self['enableJitterBuffer'] = $enableJitterBuffer;
        null !== $jitterbufferMsecMax && $self['jitterbufferMsecMax'] = $jitterbufferMsecMax;
        null !== $jitterbufferMsecMin && $self['jitterbufferMsecMin'] = $jitterbufferMsecMin;

        return $self;
    }

    /**
     * Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled.
     */
    public function withEnableJitterBuffer(bool $enableJitterBuffer): self
    {
        $self = clone $this;
        $self['enableJitterBuffer'] = $enableJitterBuffer;

        return $self;
    }

    /**
     * The maximum jitter buffer size in milliseconds. Must be between 40 and 400. Has no effect if enable_jitter_buffer is not true.
     */
    public function withJitterbufferMsecMax(int $jitterbufferMsecMax): self
    {
        $self = clone $this;
        $self['jitterbufferMsecMax'] = $jitterbufferMsecMax;

        return $self;
    }

    /**
     * The minimum jitter buffer size in milliseconds. Must be between 40 and 400. Has no effect if enable_jitter_buffer is not true.
     */
    public function withJitterbufferMsecMin(int $jitterbufferMsecMin): self
    {
        $self = clone $this;
        $self['jitterbufferMsecMin'] = $jitterbufferMsecMin;

        return $self;
    }
}
