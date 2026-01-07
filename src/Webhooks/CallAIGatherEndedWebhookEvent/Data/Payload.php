<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallAIGatherEndedWebhookEvent\Data\Payload\MessageHistory;
use Telnyx\Webhooks\CallAIGatherEndedWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-import-type MessageHistoryShape from \Telnyx\Webhooks\CallAIGatherEndedWebhookEvent\Data\Payload\MessageHistory
 *
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   from?: string|null,
 *   messageHistory?: list<MessageHistory|MessageHistoryShape>|null,
 *   result?: array<string,mixed>|null,
 *   status?: null|Status|value-of<Status>,
 *   to?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Telnyx connection ID used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Number or SIP URI placing the call.
     */
    #[Optional]
    public ?string $from;

    /**
     * The history of the messages exchanged during the AI gather.
     *
     * @var list<MessageHistory>|null $messageHistory
     */
    #[Optional('message_history', list: MessageHistory::class)]
    public ?array $messageHistory;

    /**
     * The result of the AI gather, its type depends of the `parameters` provided in the command.
     *
     * @var array<string,mixed>|null $result
     */
    #[Optional(map: 'mixed')]
    public ?array $result;

    /**
     * Reflects how command ended.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Optional]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MessageHistory|MessageHistoryShape>|null $messageHistory
     * @param array<string,mixed>|null $result
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $from = null,
        ?array $messageHistory = null,
        ?array $result = null,
        Status|string|null $status = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $from && $self['from'] = $from;
        null !== $messageHistory && $self['messageHistory'] = $messageHistory;
        null !== $result && $self['result'] = $result;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Telnyx connection ID used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

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
     * The history of the messages exchanged during the AI gather.
     *
     * @param list<MessageHistory|MessageHistoryShape> $messageHistory
     */
    public function withMessageHistory(array $messageHistory): self
    {
        $self = clone $this;
        $self['messageHistory'] = $messageHistory;

        return $self;
    }

    /**
     * The result of the AI gather, its type depends of the `parameters` provided in the command.
     *
     * @param array<string,mixed> $result
     */
    public function withResult(array $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    /**
     * Reflects how command ended.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
