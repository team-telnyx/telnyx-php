<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\Target;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TargetShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\Target
 * @phpstan-import-type CustomHeaderShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\CustomHeader
 * @phpstan-import-type VoicemailDetectionShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection
 *
 * @phpstan-type TransferShape = array{
 *   from: string,
 *   targets: list<Target|TargetShape>,
 *   customHeaders?: list<CustomHeader|CustomHeaderShape>|null,
 *   voicemailDetection?: null|VoicemailDetection|VoicemailDetectionShape,
 *   warmTransferInstructions?: string|null,
 * }
 */
final class Transfer implements BaseModel
{
    /** @use SdkModel<TransferShape> */
    use SdkModel;

    /**
     * Number or SIP URI placing the call.
     */
    #[Required]
    public string $from;

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @var list<Target> $targets
     */
    #[Required(list: Target::class)]
    public array $targets;

    /**
     * Custom headers to be added to the SIP INVITE for the transfer command.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on the transferred call. Allows the assistant to detect when a voicemail system answers the transferred call and take appropriate action.
     */
    #[Optional('voicemail_detection')]
    public ?VoicemailDetection $voicemailDetection;

    /**
     * Natural language instructions for your agent for how to provide context for the transfer recipient.
     */
    #[Optional('warm_transfer_instructions')]
    public ?string $warmTransferInstructions;

    /**
     * `new Transfer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Transfer::with(from: ..., targets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Transfer)->withFrom(...)->withTargets(...)
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
     * @param list<Target|TargetShape> $targets
     * @param list<CustomHeader|CustomHeaderShape>|null $customHeaders
     * @param VoicemailDetection|VoicemailDetectionShape|null $voicemailDetection
     */
    public static function with(
        string $from,
        array $targets,
        ?array $customHeaders = null,
        VoicemailDetection|array|null $voicemailDetection = null,
        ?string $warmTransferInstructions = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['targets'] = $targets;

        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $voicemailDetection && $self['voicemailDetection'] = $voicemailDetection;
        null !== $warmTransferInstructions && $self['warmTransferInstructions'] = $warmTransferInstructions;

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
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @param list<Target|TargetShape> $targets
     */
    public function withTargets(array $targets): self
    {
        $self = clone $this;
        $self['targets'] = $targets;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP INVITE for the transfer command.
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
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on the transferred call. Allows the assistant to detect when a voicemail system answers the transferred call and take appropriate action.
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

    /**
     * Natural language instructions for your agent for how to provide context for the transfer recipient.
     */
    public function withWarmTransferInstructions(
        string $warmTransferInstructions
    ): self {
        $self = clone $this;
        $self['warmTransferInstructions'] = $warmTransferInstructions;

        return $self;
    }
}
