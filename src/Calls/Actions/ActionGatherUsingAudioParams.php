<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Play an audio file on the call until the required DTMF signals are gathered to build interactive menus.
 *
 * You can pass a list of valid digits along with an 'invalid_audio_url', which will be played back at the beginning of each prompt. Playback will be interrupted when a DTMF signal is received. The `Answer command must be issued before the `gather_using_audio` command.
 *
 * **Expected Webhooks:**
 *
 * - `call.playback.started`
 * - `call.playback.ended`
 * - `call.dtmf.received` (you may receive many of these webhooks)
 * - `call.gather.ended`
 *
 * @see Telnyx\Services\Calls\ActionsService::gatherUsingAudio()
 *
 * @phpstan-type ActionGatherUsingAudioParamsShape = array{
 *   audioURL?: string,
 *   clientState?: string,
 *   commandID?: string,
 *   interDigitTimeoutMillis?: int,
 *   invalidAudioURL?: string,
 *   invalidMediaName?: string,
 *   maximumDigits?: int,
 *   maximumTries?: int,
 *   mediaName?: string,
 *   minimumDigits?: int,
 *   terminatingDigit?: string,
 *   timeoutMillis?: int,
 *   validDigits?: string,
 * }
 */
final class ActionGatherUsingAudioParams implements BaseModel
{
    /** @use SdkModel<ActionGatherUsingAudioParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of a file to be played back at the beginning of each prompt. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Optional('audio_url')]
    public ?string $audioURL;

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
     * The number of milliseconds to wait for input between digits.
     */
    #[Optional('inter_digit_timeout_millis')]
    public ?int $interDigitTimeoutMillis;

    /**
     * The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     */
    #[Optional('invalid_audio_url')]
    public ?string $invalidAudioURL;

    /**
     * The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional('invalid_media_name')]
    public ?string $invalidMediaName;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Optional('maximum_digits')]
    public ?int $maximumDigits;

    /**
     * The maximum number of times the file should be played if there is no input from the user on the call.
     */
    #[Optional('maximum_tries')]
    public ?int $maximumTries;

    /**
     * The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Optional('minimum_digits')]
    public ?int $minimumDigits;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Optional('terminating_digit')]
    public ?string $terminatingDigit;

    /**
     * The number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file.
     */
    #[Optional('timeout_millis')]
    public ?int $timeoutMillis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Optional('valid_digits')]
    public ?string $validDigits;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?int $interDigitTimeoutMillis = null,
        ?string $invalidAudioURL = null,
        ?string $invalidMediaName = null,
        ?int $maximumDigits = null,
        ?int $maximumTries = null,
        ?string $mediaName = null,
        ?int $minimumDigits = null,
        ?string $terminatingDigit = null,
        ?int $timeoutMillis = null,
        ?string $validDigits = null,
    ): self {
        $self = new self;

        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $interDigitTimeoutMillis && $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;
        null !== $invalidAudioURL && $self['invalidAudioURL'] = $invalidAudioURL;
        null !== $invalidMediaName && $self['invalidMediaName'] = $invalidMediaName;
        null !== $maximumDigits && $self['maximumDigits'] = $maximumDigits;
        null !== $maximumTries && $self['maximumTries'] = $maximumTries;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $minimumDigits && $self['minimumDigits'] = $minimumDigits;
        null !== $terminatingDigit && $self['terminatingDigit'] = $terminatingDigit;
        null !== $timeoutMillis && $self['timeoutMillis'] = $timeoutMillis;
        null !== $validDigits && $self['validDigits'] = $validDigits;

        return $self;
    }

    /**
     * The URL of a file to be played back at the beginning of each prompt. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

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

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $self = clone $this;
        $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;

        return $self;
    }

    /**
     * The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     */
    public function withInvalidAudioURL(string $invalidAudioURL): self
    {
        $self = clone $this;
        $self['invalidAudioURL'] = $invalidAudioURL;

        return $self;
    }

    /**
     * The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withInvalidMediaName(string $invalidMediaName): self
    {
        $self = clone $this;
        $self['invalidMediaName'] = $invalidMediaName;

        return $self;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $self = clone $this;
        $self['maximumDigits'] = $maximumDigits;

        return $self;
    }

    /**
     * The maximum number of times the file should be played if there is no input from the user on the call.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $self = clone $this;
        $self['maximumTries'] = $maximumTries;

        return $self;
    }

    /**
     * The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $self = clone $this;
        $self['minimumDigits'] = $minimumDigits;

        return $self;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $self = clone $this;
        $self['terminatingDigit'] = $terminatingDigit;

        return $self;
    }

    /**
     * The number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $self = clone $this;
        $self['timeoutMillis'] = $timeoutMillis;

        return $self;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $self = clone $this;
        $self['validDigits'] = $validDigits;

        return $self;
    }
}
