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
 *   accountSid: string,
 *   playBeep?: bool|null,
 *   recordingChannels?: null|RecordingChannels|value-of<RecordingChannels>,
 *   recordingStatusCallback?: string|null,
 *   recordingStatusCallbackEvent?: string|null,
 *   recordingStatusCallbackMethod?: null|RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
 *   recordingTrack?: null|RecordingTrack|value-of<RecordingTrack>,
 *   sendRecordingURL?: bool|null,
 * }
 */
final class RecordingsJsonRecordingsJsonParams implements BaseModel
{
    /** @use SdkModel<RecordingsJsonRecordingsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * Whether to play a beep when recording is started.
     */
    #[Optional('PlayBeep')]
    public ?bool $playBeep;

    /**
     * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     *
     * @var value-of<RecordingChannels>|null $recordingChannels
     */
    #[Optional('RecordingChannels', enum: RecordingChannels::class)]
    public ?string $recordingChannels;

    /**
     * Url where status callbacks will be sent.
     */
    #[Optional('RecordingStatusCallback')]
    public ?string $recordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Optional('RecordingStatusCallbackEvent')]
    public ?string $recordingStatusCallbackEvent;

    /**
     * HTTP method used to send status callbacks.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     */
    #[Optional(
        'RecordingStatusCallbackMethod',
        enum: RecordingStatusCallbackMethod::class
    )]
    public ?string $recordingStatusCallbackMethod;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $recordingTrack
     */
    #[Optional('RecordingTrack', enum: RecordingTrack::class)]
    public ?string $recordingTrack;

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    #[Optional('SendRecordingUrl')]
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
     * @param RecordingChannels|value-of<RecordingChannels>|null $recordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack>|null $recordingTrack
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
        $self = new self;

        $self['accountSid'] = $accountSid;

        null !== $playBeep && $self['playBeep'] = $playBeep;
        null !== $recordingChannels && $self['recordingChannels'] = $recordingChannels;
        null !== $recordingStatusCallback && $self['recordingStatusCallback'] = $recordingStatusCallback;
        null !== $recordingStatusCallbackEvent && $self['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        null !== $recordingStatusCallbackMethod && $self['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        null !== $recordingTrack && $self['recordingTrack'] = $recordingTrack;
        null !== $sendRecordingURL && $self['sendRecordingURL'] = $sendRecordingURL;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * Whether to play a beep when recording is started.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $self = clone $this;
        $self['playBeep'] = $playBeep;

        return $self;
    }

    /**
     * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels
    ): self {
        $self = clone $this;
        $self['recordingChannels'] = $recordingChannels;

        return $self;
    }

    /**
     * Url where status callbacks will be sent.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $self = clone $this;
        $self['recordingStatusCallback'] = $recordingStatusCallback;

        return $self;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $self = clone $this;
        $self['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $self;
    }

    /**
     * HTTP method used to send status callbacks.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod
    ): self {
        $self = clone $this;
        $self['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $self;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $self = clone $this;
        $self['recordingTrack'] = $recordingTrack;

        return $self;
    }

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    public function withSendRecordingURL(bool $sendRecordingURL): self
    {
        $self = clone $this;
        $self['sendRecordingURL'] = $sendRecordingURL;

        return $self;
    }
}
