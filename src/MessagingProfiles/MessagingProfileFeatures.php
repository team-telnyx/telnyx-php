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
 *   aiOptOutDetectionEnabled?: bool|null
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $aiOptOutDetectionEnabled = null): self
    {
        $self = new self;

        null !== $aiOptOutDetectionEnabled && $self['aiOptOutDetectionEnabled'] = $aiOptOutDetectionEnabled;

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
}
