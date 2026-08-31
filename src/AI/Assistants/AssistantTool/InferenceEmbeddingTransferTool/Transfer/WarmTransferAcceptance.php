<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\WarmTransferAcceptance\EndUserTargetContextMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Requires the transfer destination to accept the call before the caller is bridged. When enabled, the assistant speaks privately with the destination after they answer — delivering the warm transfer message and asking whether they take the call — while the caller keeps hearing ringback. The assistant then finalizes the transfer with the built-in `complete_transfer` tool: an accept bridges the calls, a decline hangs up the destination and returns the assistant to the caller with the reason the destination gave. Requires either `warm_transfer_instructions` or a `message` on every target, otherwise the assistant fails to save. Only available for calls started with `ai_assistant_start`; single-caller conversations only (a conference or additional invited participants fall back to a regular warm transfer).
 *
 * @phpstan-type WarmTransferAcceptanceShape = array{
 *   enabled?: bool|null,
 *   endUserTargetContextMode?: null|EndUserTargetContextMode|value-of<EndUserTargetContextMode>,
 * }
 */
final class WarmTransferAcceptance implements BaseModel
{
    /** @use SdkModel<WarmTransferAcceptanceShape> */
    use SdkModel;

    /**
     * Whether the destination must accept the transfer before the calls are bridged.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Controls whether the private exchange between the assistant and the transfer destination is kept out of the conversation. With `private` (default) the exchange never reaches the conversation history, AI conversations, webhooks or insights, and the transfer tool result is rewritten with the outcome only. With `shared` the exchange stays in the conversation like any other messages.
     *
     * @var value-of<EndUserTargetContextMode>|null $endUserTargetContextMode
     */
    #[Optional(
        'end_user_target_context_mode',
        enum: EndUserTargetContextMode::class
    )]
    public ?string $endUserTargetContextMode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EndUserTargetContextMode|value-of<EndUserTargetContextMode>|null $endUserTargetContextMode
     */
    public static function with(
        ?bool $enabled = null,
        EndUserTargetContextMode|string|null $endUserTargetContextMode = null,
    ): self {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;
        null !== $endUserTargetContextMode && $self['endUserTargetContextMode'] = $endUserTargetContextMode;

        return $self;
    }

    /**
     * Whether the destination must accept the transfer before the calls are bridged.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Controls whether the private exchange between the assistant and the transfer destination is kept out of the conversation. With `private` (default) the exchange never reaches the conversation history, AI conversations, webhooks or insights, and the transfer tool result is rewritten with the outcome only. With `shared` the exchange stays in the conversation like any other messages.
     *
     * @param EndUserTargetContextMode|value-of<EndUserTargetContextMode> $endUserTargetContextMode
     */
    public function withEndUserTargetContextMode(
        EndUserTargetContextMode|string $endUserTargetContextMode
    ): self {
        $self = clone $this;
        $self['endUserTargetContextMode'] = $endUserTargetContextMode;

        return $self;
    }
}
