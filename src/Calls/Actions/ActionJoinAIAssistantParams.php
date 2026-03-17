<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionJoinAIAssistantParams\Participant;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Add a participant to an existing AI assistant conversation. Use this command to bring an additional call leg into a running AI conversation.
 *
 * @see Telnyx\Services\Calls\ActionsService::joinAIAssistant()
 *
 * @phpstan-import-type ParticipantShape from \Telnyx\Calls\Actions\ActionJoinAIAssistantParams\Participant
 *
 * @phpstan-type ActionJoinAIAssistantParamsShape = array{
 *   conversationID: string,
 *   participant: Participant|ParticipantShape,
 *   clientState?: string|null,
 *   commandID?: string|null,
 * }
 */
final class ActionJoinAIAssistantParams implements BaseModel
{
    /** @use SdkModel<ActionJoinAIAssistantParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the AI assistant conversation to join.
     */
    #[Required('conversation_id')]
    public string $conversationID;

    #[Required]
    public Participant $participant;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * `new ActionJoinAIAssistantParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionJoinAIAssistantParams::with(conversationID: ..., participant: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionJoinAIAssistantParams)->withConversationID(...)->withParticipant(...)
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
     * @param Participant|ParticipantShape $participant
     */
    public static function with(
        string $conversationID,
        Participant|array $participant,
        ?string $clientState = null,
        ?string $commandID = null,
    ): self {
        $self = new self;

        $self['conversationID'] = $conversationID;
        $self['participant'] = $participant;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * The ID of the AI assistant conversation to join.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * @param Participant|ParticipantShape $participant
     */
    public function withParticipant(Participant|array $participant): self
    {
        $self = clone $this;
        $self['participant'] = $participant;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }
}
