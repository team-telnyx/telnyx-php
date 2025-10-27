<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;

/**
 * Starts recording with specified parameters for call idientified by call_sid.
 *
 * @see Telnyx\Texml\Accounts\Calls\RecordingsJson->recordingsJson
 *
 * @phpstan-type recordings_json_recordings_json_params = array{
 *   accountSid: string,
 *   playBeep?: bool,
 *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
 *   recordingStatusCallback?: string,
 *   recordingStatusCallbackEvent?: string,
 *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
 *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
 *   sendRecordingURL?: bool,
 * }
 */
final class RecordingsJsonRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<recordings_json_recordings_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * Whether to play a beep when recording is started.
     */
    #[Api('PlayBeep', optional: true)]
    public ?bool $playBeep;

    /**
     * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     *
     * @var value-of<RecordingChannels>|null $recordingChannels
     */
    #[Api('RecordingChannels', enum: RecordingChannels::class, optional: true)]
    public ?string $recordingChannels;

    /**
     * Url where status callbacks will be sent.
     */
    #[Api('RecordingStatusCallback', optional: true)]
    public ?string $recordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Api('RecordingStatusCallbackEvent', optional: true)]
    public ?string $recordingStatusCallbackEvent;

    /**
     * HTTP method used to send status callbacks.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     */
    #[Api(
        'RecordingStatusCallbackMethod',
        enum: RecordingStatusCallbackMethod::class,
        optional: true,
    )]
    public ?string $recordingStatusCallbackMethod;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $recordingTrack
     */
    #[Api('RecordingTrack', enum: RecordingTrack::class, optional: true)]
    public ?string $recordingTrack;

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    #[Api('SendRecordingUrl', optional: true)]
    public ?bool $sendRecordingURL;

    /**
     * `new RecordingsJsonRecordingsJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingsJsonRecordingsJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingsJsonRecordingsJsonParams)->withAccountSid(...)
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
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public static function with(
        string $accountSid,
        ?bool $playBeep = null,
        RecordingChannels|string|null $recordingChannels = null,
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $recordingStatusCallbackMethod = null,
        RecordingTrack|string|null $recordingTrack = null,
        ?bool $sendRecordingURL = null,
    ): self {
        $obj = new self;

        $obj->accountSid = $accountSid;

        null !== $playBeep && $obj->playBeep = $playBeep;
        null !== $recordingChannels && $obj['recordingChannels'] = $recordingChannels;
        null !== $recordingStatusCallback && $obj->recordingStatusCallback = $recordingStatusCallback;
        null !== $recordingStatusCallbackEvent && $obj->recordingStatusCallbackEvent = $recordingStatusCallbackEvent;
        null !== $recordingStatusCallbackMethod && $obj['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        null !== $recordingTrack && $obj['recordingTrack'] = $recordingTrack;
        null !== $sendRecordingURL && $obj->sendRecordingURL = $sendRecordingURL;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    /**
     * Whether to play a beep when recording is started.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $obj = clone $this;
        $obj->playBeep = $playBeep;

        return $obj;
    }

    /**
     * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels
    ): self {
        $obj = clone $this;
        $obj['recordingChannels'] = $recordingChannels;

        return $obj;
    }

    /**
     * Url where status callbacks will be sent.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj->recordingStatusCallback = $recordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj->recordingStatusCallbackEvent = $recordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP method used to send status callbacks.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $obj = clone $this;
        $obj['recordingTrack'] = $recordingTrack;

        return $obj;
    }

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    public function withSendRecordingURL(bool $sendRecordingURL): self
    {
        $obj = clone $this;
        $obj->sendRecordingURL = $sendRecordingURL;

        return $obj;
    }
}
