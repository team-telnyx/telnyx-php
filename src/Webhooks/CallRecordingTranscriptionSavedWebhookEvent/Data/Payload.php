<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data\Payload\CallingPartyType;
use Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string,
 *   callLegID?: string,
 *   callSessionID?: string,
 *   callingPartyType?: value-of<CallingPartyType>,
 *   clientState?: string,
 *   connectionID?: string,
 *   recordingID?: string,
 *   recordingTranscriptionID?: string,
 *   status?: value-of<Status>,
 *   transcriptionText?: string,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $callingPartyType
     */
    #[Api('calling_party_type', enum: CallingPartyType::class, optional: true)]
    public ?string $callingPartyType;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * ID that is unique to the recording session and can be used to correlate webhook events.
     */
    #[Api('recording_id', optional: true)]
    public ?string $recordingID;

    /**
     * ID that is unique to the transcription process and can be used to correlate webhook events.
     */
    #[Api('recording_transcription_id', optional: true)]
    public ?string $recordingTranscriptionID;

    /**
     * The transcription status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The transcribed text.
     */
    #[Api('transcription_text', optional: true)]
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

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $callingPartyType && $obj->callingPartyType = $callingPartyType instanceof CallingPartyType ? $callingPartyType->value : $callingPartyType;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $recordingID && $obj->recordingID = $recordingID;
        null !== $recordingTranscriptionID && $obj->recordingTranscriptionID = $recordingTranscriptionID;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $transcriptionText && $obj->transcriptionText = $transcriptionText;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

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
        $obj->callingPartyType = $callingPartyType instanceof CallingPartyType ? $callingPartyType->value : $callingPartyType;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * ID that is unique to the recording session and can be used to correlate webhook events.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recordingID = $recordingID;

        return $obj;
    }

    /**
     * ID that is unique to the transcription process and can be used to correlate webhook events.
     */
    public function withRecordingTranscriptionID(
        string $recordingTranscriptionID
    ): self {
        $obj = clone $this;
        $obj->recordingTranscriptionID = $recordingTranscriptionID;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $obj = clone $this;
        $obj->transcriptionText = $transcriptionText;

        return $obj;
    }
}
