<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingTranscriptionSaved;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallRecordingTranscriptionSaved\Payload\CallingPartyType;
use Telnyx\Webhooks\CallRecordingTranscriptionSaved\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   callingPartyType?: null|CallingPartyType|value-of<CallingPartyType>,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   recordingID?: string|null,
 *   recordingTranscriptionID?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   transcriptionText?: string|null,
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
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $callingPartyType
     */
    #[Optional('calling_party_type', enum: CallingPartyType::class)]
    public ?string $callingPartyType;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * ID that is unique to the recording session and can be used to correlate webhook events.
     */
    #[Optional('recording_id')]
    public ?string $recordingID;

    /**
     * ID that is unique to the transcription process and can be used to correlate webhook events.
     */
    #[Optional('recording_transcription_id')]
    public ?string $recordingTranscriptionID;

    /**
     * The transcription status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The transcribed text.
     */
    #[Optional('transcription_text')]
    public ?string $transcriptionText;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallingPartyType|value-of<CallingPartyType>|null $callingPartyType
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        CallingPartyType|string|null $callingPartyType = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $recordingID = null,
        ?string $recordingTranscriptionID = null,
        Status|string|null $status = null,
        ?string $transcriptionText = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $callingPartyType && $self['callingPartyType'] = $callingPartyType;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $recordingID && $self['recordingID'] = $recordingID;
        null !== $recordingTranscriptionID && $self['recordingTranscriptionID'] = $recordingTranscriptionID;
        null !== $status && $self['status'] = $status;
        null !== $transcriptionText && $self['transcriptionText'] = $transcriptionText;

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
     * The type of calling party connection.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     */
    public function withCallingPartyType(
        CallingPartyType|string $callingPartyType
    ): self {
        $self = clone $this;
        $self['callingPartyType'] = $callingPartyType;

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
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ID that is unique to the recording session and can be used to correlate webhook events.
     */
    public function withRecordingID(string $recordingID): self
    {
        $self = clone $this;
        $self['recordingID'] = $recordingID;

        return $self;
    }

    /**
     * ID that is unique to the transcription process and can be used to correlate webhook events.
     */
    public function withRecordingTranscriptionID(
        string $recordingTranscriptionID
    ): self {
        $self = clone $this;
        $self['recordingTranscriptionID'] = $recordingTranscriptionID;

        return $self;
    }

    /**
     * The transcription status.
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
     * The transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $self = clone $this;
        $self['transcriptionText'] = $transcriptionText;

        return $self;
    }
}
