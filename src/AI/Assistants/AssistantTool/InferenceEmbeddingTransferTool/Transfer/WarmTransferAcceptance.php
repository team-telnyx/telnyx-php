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
 *   requireAcceptance?: bool|null,
 *   timeoutSecs?: int|null,
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

    /**
     * Fail closed when the acceptance consult cannot run. Off by default: if the consult cannot be set up for any reason — including where acceptance is unavailable at all (`gather_using_ai`, Conversation Relay or web calls, a conference, or additional invited participants) — the transfer degrades to a plain warm transfer (the warm transfer message is played to the destination as audio and the calls are bridged anyway). Set to true to treat those paths as a decline instead: the destination is disconnected without being asked, the assistant returns to the caller, and no bridge happens without an acceptance. Only consult-setup failures are affected; the destination must still explicitly accept on every consult that does run.
     */
    #[Optional('require_acceptance')]
    public ?bool $requireAcceptance;

    /**
     * How long, in seconds, the destination has to accept the transfer, counted from when the private consult starts (right after the destination answers, or after `warm_message_delay_ms`). The caller keeps hearing ringback the whole time. If no acceptance arrives in time, the destination is hung up and the assistant returns to the caller (the transfer fails as a timeout). Raise it for destinations that answer before a human is on the line, such as a call-center queue/ACD or an IVR playing hold audio; keep it as short as practical, since the caller waits on ringback until it expires.
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

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
        ?bool $requireAcceptance = null,
        ?int $timeoutSecs = null,
    ): self {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;
        null !== $endUserTargetContextMode && $self['endUserTargetContextMode'] = $endUserTargetContextMode;
        null !== $requireAcceptance && $self['requireAcceptance'] = $requireAcceptance;
        null !== $timeoutSecs && $self['timeoutSecs'] = $timeoutSecs;

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

    /**
     * Fail closed when the acceptance consult cannot run. Off by default: if the consult cannot be set up for any reason — including where acceptance is unavailable at all (`gather_using_ai`, Conversation Relay or web calls, a conference, or additional invited participants) — the transfer degrades to a plain warm transfer (the warm transfer message is played to the destination as audio and the calls are bridged anyway). Set to true to treat those paths as a decline instead: the destination is disconnected without being asked, the assistant returns to the caller, and no bridge happens without an acceptance. Only consult-setup failures are affected; the destination must still explicitly accept on every consult that does run.
     */
    public function withRequireAcceptance(bool $requireAcceptance): self
    {
        $self = clone $this;
        $self['requireAcceptance'] = $requireAcceptance;

        return $self;
    }

    /**
     * How long, in seconds, the destination has to accept the transfer, counted from when the private consult starts (right after the destination answers, or after `warm_message_delay_ms`). The caller keeps hearing ringback the whole time. If no acceptance arrives in time, the destination is hung up and the assistant returns to the caller (the transfer fails as a timeout). Raise it for destinations that answer before a human is on the line, such as a call-center queue/ACD or an IVR playing hold audio; keep it as short as practical, since the caller waits on ringback until it expires.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }
}
