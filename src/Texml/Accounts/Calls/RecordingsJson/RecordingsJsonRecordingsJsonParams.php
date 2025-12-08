<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;

/**
 * Starts recording with specified parameters for call idientified by call_sid.
 *
 * @see Telnyx\Services\Texml\Accounts\Calls\RecordingsJsonService::recordingsJson()
 *
 * @phpstan-type RecordingsJsonRecordingsJsonParamsShape = array{
 *   account_sid: string,
 *   PlayBeep?: bool,
 *   RecordingChannels?: \Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels|value-of<\Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels>,
 *   RecordingStatusCallback?: string,
 *   RecordingStatusCallbackEvent?: string,
 *   RecordingStatusCallbackMethod?: \Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod>,
 *   RecordingTrack?: \Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack|value-of<\Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack>,
 *   SendRecordingUrl?: bool,
 * }
 */
final class RecordingsJsonRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<RecordingsJsonRecordingsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account_sid;

    /**
     * Whether to play a beep when recording is started.
     */
    #[Optional]
    public ?bool $PlayBeep;

    /**
     * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     *
     * @var value-of<RecordingChannels>|null $RecordingChannels
     */
    #[Optional(
        enum: RecordingChannels::class,
    )]
    public ?string $RecordingChannels;

    /**
     * Url where status callbacks will be sent.
     */
    #[Optional]
    public ?string $RecordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Optional]
    public ?string $RecordingStatusCallbackEvent;

    /**
     * HTTP method used to send status callbacks.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $RecordingStatusCallbackMethod
     */
    #[Optional(
        enum: RecordingStatusCallbackMethod::class,
    )]
    public ?string $RecordingStatusCallbackMethod;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $RecordingTrack
     */
    #[Optional(
        enum: RecordingTrack::class,
    )]
    public ?string $RecordingTrack;

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    #[Optional]
    public ?bool $SendRecordingUrl;

    /**
     * `new RecordingsJsonRecordingsJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingsJsonRecordingsJsonParams::with(account_sid: ...)
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
     * @param RecordingChannels|value-of<RecordingChannels> $RecordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $RecordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack> $RecordingTrack
     */
    public static function with(
        string $account_sid,
        ?bool $PlayBeep = null,
        RecordingChannels|string|null $RecordingChannels = null,
        ?string $RecordingStatusCallback = null,
        ?string $RecordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $RecordingStatusCallbackMethod = null,
        RecordingTrack|string|null $RecordingTrack = null,
        ?bool $SendRecordingUrl = null,
    ): self {
        $obj = new self;

        $obj['account_sid'] = $account_sid;

        null !== $PlayBeep && $obj['PlayBeep'] = $PlayBeep;
        null !== $RecordingChannels && $obj['RecordingChannels'] = $RecordingChannels;
        null !== $RecordingStatusCallback && $obj['RecordingStatusCallback'] = $RecordingStatusCallback;
        null !== $RecordingStatusCallbackEvent && $obj['RecordingStatusCallbackEvent'] = $RecordingStatusCallbackEvent;
        null !== $RecordingStatusCallbackMethod && $obj['RecordingStatusCallbackMethod'] = $RecordingStatusCallbackMethod;
        null !== $RecordingTrack && $obj['RecordingTrack'] = $RecordingTrack;
        null !== $SendRecordingUrl && $obj['SendRecordingUrl'] = $SendRecordingUrl;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * Whether to play a beep when recording is started.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $obj = clone $this;
        $obj['PlayBeep'] = $playBeep;

        return $obj;
    }

    /**
     * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels,
    ): self {
        $obj = clone $this;
        $obj['RecordingChannels'] = $recordingChannels;

        return $obj;
    }

    /**
     * Url where status callbacks will be sent.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallback'] = $recordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP method used to send status callbacks.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack,
    ): self {
        $obj = clone $this;
        $obj['RecordingTrack'] = $recordingTrack;

        return $obj;
    }

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    public function withSendRecordingURL(bool $sendRecordingURL): self
    {
        $obj = clone $this;
        $obj['SendRecordingUrl'] = $sendRecordingURL;

        return $obj;
    }
}
