<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionGatherUsingAudioParams); // set properties as needed
 * $client->calls.actions->gatherUsingAudio(...$params->toArray());
 * ```
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
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->gatherUsingAudio(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->gatherUsingAudio
 *
 * @phpstan-type action_gather_using_audio_params = array{
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
    /** @use SdkModel<action_gather_using_audio_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of a file to be played back at the beginning of each prompt. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Api('audio_url', optional: true)]
    public ?string $audioURL;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Api('inter_digit_timeout_millis', optional: true)]
    public ?int $interDigitTimeoutMillis;

    /**
     * The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     */
    #[Api('invalid_audio_url', optional: true)]
    public ?string $invalidAudioURL;

    /**
     * The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('invalid_media_name', optional: true)]
    public ?string $invalidMediaName;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Api('maximum_digits', optional: true)]
    public ?int $maximumDigits;

    /**
     * The maximum number of times the file should be played if there is no input from the user on the call.
     */
    #[Api('maximum_tries', optional: true)]
    public ?int $maximumTries;

    /**
     * The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Api('minimum_digits', optional: true)]
    public ?int $minimumDigits;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Api('terminating_digit', optional: true)]
    public ?string $terminatingDigit;

    /**
     * The number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file.
     */
    #[Api('timeout_millis', optional: true)]
    public ?int $timeoutMillis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Api('valid_digits', optional: true)]
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
        $obj = new self;

        null !== $audioURL && $obj->audioURL = $audioURL;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $interDigitTimeoutMillis && $obj->interDigitTimeoutMillis = $interDigitTimeoutMillis;
        null !== $invalidAudioURL && $obj->invalidAudioURL = $invalidAudioURL;
        null !== $invalidMediaName && $obj->invalidMediaName = $invalidMediaName;
        null !== $maximumDigits && $obj->maximumDigits = $maximumDigits;
        null !== $maximumTries && $obj->maximumTries = $maximumTries;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $minimumDigits && $obj->minimumDigits = $minimumDigits;
        null !== $terminatingDigit && $obj->terminatingDigit = $terminatingDigit;
        null !== $timeoutMillis && $obj->timeoutMillis = $timeoutMillis;
        null !== $validDigits && $obj->validDigits = $validDigits;

        return $obj;
    }

    /**
     * The URL of a file to be played back at the beginning of each prompt. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audioURL = $audioURL;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $obj = clone $this;
        $obj->interDigitTimeoutMillis = $interDigitTimeoutMillis;

        return $obj;
    }

    /**
     * The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     */
    public function withInvalidAudioURL(string $invalidAudioURL): self
    {
        $obj = clone $this;
        $obj->invalidAudioURL = $invalidAudioURL;

        return $obj;
    }

    /**
     * The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withInvalidMediaName(string $invalidMediaName): self
    {
        $obj = clone $this;
        $obj->invalidMediaName = $invalidMediaName;

        return $obj;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $obj = clone $this;
        $obj->maximumDigits = $maximumDigits;

        return $obj;
    }

    /**
     * The maximum number of times the file should be played if there is no input from the user on the call.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $obj = clone $this;
        $obj->maximumTries = $maximumTries;

        return $obj;
    }

    /**
     * The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $obj = clone $this;
        $obj->minimumDigits = $minimumDigits;

        return $obj;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $obj = clone $this;
        $obj->terminatingDigit = $terminatingDigit;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $obj = clone $this;
        $obj->timeoutMillis = $timeoutMillis;

        return $obj;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $obj = clone $this;
        $obj->validDigits = $validDigits;

        return $obj;
    }
}
