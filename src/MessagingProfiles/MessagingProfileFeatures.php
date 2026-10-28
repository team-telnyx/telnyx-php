<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telnyx product features the messaging customer can enable on the messaging profile. Keys map to individual feature flags; unknown keys are accepted and preserved for forward compatibility with rolling deployments.
 *
 * @phpstan-type MessagingProfileFeaturesShape = array{
 *   aiOptOutDetectionEnabled?: bool|null, autoChunkLongMessages?: bool|null
 * }
 */
final class MessagingProfileFeatures implements BaseModel
{
    /** @use SdkModel<MessagingProfileFeaturesShape> */
    use SdkModel;

    /**
     * Enables AI detection of inbound opt-out messages that do not follow the standard STOP/UNSTOP/HELP opt-out keyword pattern. When enabled, the messaging platform applies an AI model to identify non-standard opt-out requests (e.g. natural-language phrases) and treats them as opt-outs.
     */
    #[Optional('ai_opt_out_detection_enabled')]
    public ?bool $aiOptOutDetectionEnabled;

    /**
     * Enables server-side chunking of outbound SMS. When enabled, an outbound message that exceeds the maximum number of segments allowed for its destination (10 segments by default; some aggregators accept up to 25) is automatically split into multiple child messages, each within the segment limit, and sent sequentially in order. Splitting is encoding-aware: GSM-7 bodies split at 153-character boundaries and UCS-2 bodies at 134-character boundaries. When disabled (the default), messages exceeding the segment limit are rejected with an error.
     */
    #[Optional('auto_chunk_long_messages')]
    public ?bool $autoChunkLongMessages;

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
        ?bool $aiOptOutDetectionEnabled = null,
        ?bool $autoChunkLongMessages = null
    ): self {
        $self = new self;

        null !== $aiOptOutDetectionEnabled && $self['aiOptOutDetectionEnabled'] = $aiOptOutDetectionEnabled;
        null !== $autoChunkLongMessages && $self['autoChunkLongMessages'] = $autoChunkLongMessages;

        return $self;
    }

    /**
     * Enables AI detection of inbound opt-out messages that do not follow the standard STOP/UNSTOP/HELP opt-out keyword pattern. When enabled, the messaging platform applies an AI model to identify non-standard opt-out requests (e.g. natural-language phrases) and treats them as opt-outs.
     */
    public function withAIOptOutDetectionEnabled(
        bool $aiOptOutDetectionEnabled
    ): self {
        $self = clone $this;
        $self['aiOptOutDetectionEnabled'] = $aiOptOutDetectionEnabled;

        return $self;
    }

    /**
     * Enables server-side chunking of outbound SMS. When enabled, an outbound message that exceeds the maximum number of segments allowed for its destination (10 segments by default; some aggregators accept up to 25) is automatically split into multiple child messages, each within the segment limit, and sent sequentially in order. Splitting is encoding-aware: GSM-7 bodies split at 153-character boundaries and UCS-2 bodies at 134-character boundaries. When disabled (the default), messages exceeding the segment limit are rejected with an error.
     */
    public function withAutoChunkLongMessages(bool $autoChunkLongMessages): self
    {
        $self = clone $this;
        $self['autoChunkLongMessages'] = $autoChunkLongMessages;

        return $self;
    }
}
