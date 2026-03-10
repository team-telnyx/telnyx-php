<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InviteTool;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig\VoicemailDetection;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CustomHeaderShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig\CustomHeader
 * @phpstan-import-type VoicemailDetectionShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig\VoicemailDetection
 *
 * @phpstan-type InviteConfigShape = array{
 *   customHeaders?: list<CustomHeader|CustomHeaderShape>|null,
 *   from?: string|null,
 *   voicemailDetection?: null|VoicemailDetection|VoicemailDetectionShape,
 * }
 */
final class InviteConfig implements BaseModel
{
    /** @use SdkModel<InviteConfigShape> */
    use SdkModel;

    /**
     * Custom headers to be added to the SIP INVITE for the invite command.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * Number or SIP URI placing the call.
     */
    #[Optional]
    public ?string $from;

    /**
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on the invited call.
     */
    #[Optional('voicemail_detection')]
    public ?VoicemailDetection $voicemailDetection;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CustomHeader|CustomHeaderShape>|null $customHeaders
     * @param VoicemailDetection|VoicemailDetectionShape|null $voicemailDetection
     */
    public static function with(
        ?array $customHeaders = null,
        ?string $from = null,
        VoicemailDetection|array|null $voicemailDetection = null,
    ): self {
        $self = new self;

        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $from && $self['from'] = $from;
        null !== $voicemailDetection && $self['voicemailDetection'] = $voicemailDetection;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP INVITE for the invite command.
     *
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on the invited call.
     *
     * @param VoicemailDetection|VoicemailDetectionShape $voicemailDetection
     */
    public function withVoicemailDetection(
        VoicemailDetection|array $voicemailDetection
    ): self {
        $self = clone $this;
        $self['voicemailDetection'] = $voicemailDetection;

        return $self;
    }
}
