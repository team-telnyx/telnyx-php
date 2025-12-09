<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data\Payload\CallingPartyType;
use Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   callingPartyType?: value-of<CallingPartyType>|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   recordingID?: string|null,
 *   recordingTranscriptionID?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        null !== $callControlID && $obj['callControlID'] = $callControlID;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $callingPartyType && $obj['callingPartyType'] = $callingPartyType;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $recordingID && $obj['recordingID'] = $recordingID;
        null !== $recordingTranscriptionID && $obj['recordingTranscriptionID'] = $recordingTranscriptionID;
        null !== $status && $obj['status'] = $status;
        null !== $transcriptionText && $obj['transcriptionText'] = $transcriptionText;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['callControlID'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

        return $obj;
    }

    /**
     * The type of calling party connection.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     */
    public function withCallingPartyType(
        CallingPartyType|string $callingPartyType
    ): self {
        $obj = clone $this;
        $obj['callingPartyType'] = $callingPartyType;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * ID that is unique to the recording session and can be used to correlate webhook events.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj['recordingID'] = $recordingID;

        return $obj;
    }

    /**
     * ID that is unique to the transcription process and can be used to correlate webhook events.
     */
    public function withRecordingTranscriptionID(
        string $recordingTranscriptionID
    ): self {
        $obj = clone $this;
        $obj['recordingTranscriptionID'] = $recordingTranscriptionID;

        return $obj;
    }

    /**
     * The transcription status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $obj = clone $this;
        $obj['transcriptionText'] = $transcriptionText;

        return $obj;
    }
}
