<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InviteTool;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\Targets;
use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\VoicemailDetection;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TargetsVariants from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\Targets
 * @phpstan-import-type CustomHeaderShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\CustomHeader
 * @phpstan-import-type TargetsShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\Targets
 * @phpstan-import-type VoicemailDetectionShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\VoicemailDetection
 *
 * @phpstan-type InviteShape = array{
 *   from: string,
 *   customHeaders?: list<CustomHeader|CustomHeaderShape>|null,
 *   targets?: TargetsShape|null,
 *   voicemailDetection?: null|VoicemailDetection|VoicemailDetectionShape,
 * }
 */
final class Invite implements BaseModel
{
    /** @use SdkModel<InviteShape> */
    use SdkModel;

    /**
     * Number or SIP URI placing the call.
     */
    #[Required]
    public string $from;

    /**
     * Custom headers to be added to the SIP INVITE for the invite command.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * The different possible targets of the invite. The assistant will be able to choose one of the targets to invite to the call. This can also be a dynamic variable string like `{{ targets }}` where `targets` is returned by the dynamic variables webhook and resolves to an array of target objects at runtime. If omitted or null, the invite tool can still be configured and targets may be supplied dynamically at runtime.
     *
     * @var TargetsVariants|null $targets
     */
    #[Optional(union: Targets::class, nullable: true)]
    public string|array|null $targets;

    /**
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on the invited call.
     */
    #[Optional('voicemail_detection')]
    public ?VoicemailDetection $voicemailDetection;

    /**
     * `new Invite()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Invite::with(from: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Invite)->withFrom(...)
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
     *
     * @param list<CustomHeader|CustomHeaderShape>|null $customHeaders
     * @param TargetsShape|null $targets
     * @param VoicemailDetection|VoicemailDetectionShape|null $voicemailDetection
     */
    public static function with(
        string $from,
        ?array $customHeaders = null,
        string|array|null $targets = null,
        VoicemailDetection|array|null $voicemailDetection = null,
    ): self {
        $self = new self;

        $self['from'] = $from;

        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $targets && $self['targets'] = $targets;
        null !== $voicemailDetection && $self['voicemailDetection'] = $voicemailDetection;

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
     * The different possible targets of the invite. The assistant will be able to choose one of the targets to invite to the call. This can also be a dynamic variable string like `{{ targets }}` where `targets` is returned by the dynamic variables webhook and resolves to an array of target objects at runtime. If omitted or null, the invite tool can still be configured and targets may be supplied dynamically at runtime.
     *
     * @param TargetsShape|null $targets
     */
    public function withTargets(string|array|null $targets): self
    {
        $self = clone $this;
        $self['targets'] = $targets;

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
