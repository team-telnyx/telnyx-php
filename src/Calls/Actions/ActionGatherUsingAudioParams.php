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
 *   audio_url?: string,
 *   client_state?: string,
 *   command_id?: string,
 *   inter_digit_timeout_millis?: int,
 *   invalid_audio_url?: string,
 *   invalid_media_name?: string,
 *   maximum_digits?: int,
 *   maximum_tries?: int,
 *   media_name?: string,
 *   minimum_digits?: int,
 *   terminating_digit?: string,
 *   timeout_millis?: int,
 *   valid_digits?: string,
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
    #[Optional]
    public ?string $audio_url;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional]
    public ?string $command_id;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Optional]
    public ?int $inter_digit_timeout_millis;

    /**
     * The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     */
    #[Optional]
    public ?string $invalid_audio_url;

    /**
     * The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional]
    public ?string $invalid_media_name;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Optional]
    public ?int $maximum_digits;

    /**
     * The maximum number of times the file should be played if there is no input from the user on the call.
     */
    #[Optional]
    public ?int $maximum_tries;

    /**
     * The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional]
    public ?string $media_name;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Optional]
    public ?int $minimum_digits;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Optional]
    public ?string $terminating_digit;

    /**
     * The number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file.
     */
    #[Optional]
    public ?int $timeout_millis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Optional]
    public ?string $valid_digits;

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
        ?string $audio_url = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?int $inter_digit_timeout_millis = null,
        ?string $invalid_audio_url = null,
        ?string $invalid_media_name = null,
        ?int $maximum_digits = null,
        ?int $maximum_tries = null,
        ?string $media_name = null,
        ?int $minimum_digits = null,
        ?string $terminating_digit = null,
        ?int $timeout_millis = null,
        ?string $valid_digits = null,
    ): self {
        $obj = new self;

        null !== $audio_url && $obj['audio_url'] = $audio_url;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $inter_digit_timeout_millis && $obj['inter_digit_timeout_millis'] = $inter_digit_timeout_millis;
        null !== $invalid_audio_url && $obj['invalid_audio_url'] = $invalid_audio_url;
        null !== $invalid_media_name && $obj['invalid_media_name'] = $invalid_media_name;
        null !== $maximum_digits && $obj['maximum_digits'] = $maximum_digits;
        null !== $maximum_tries && $obj['maximum_tries'] = $maximum_tries;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $minimum_digits && $obj['minimum_digits'] = $minimum_digits;
        null !== $terminating_digit && $obj['terminating_digit'] = $terminating_digit;
        null !== $timeout_millis && $obj['timeout_millis'] = $timeout_millis;
        null !== $valid_digits && $obj['valid_digits'] = $valid_digits;

        return $obj;
    }

    /**
     * The URL of a file to be played back at the beginning of each prompt. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj['audio_url'] = $audioURL;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $obj = clone $this;
        $obj['inter_digit_timeout_millis'] = $interDigitTimeoutMillis;

        return $obj;
    }

    /**
     * The URL of a file to play when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The URL can point to either a WAV or MP3 file. invalid_media_name and invalid_audio_url cannot be used together in one request.
     */
    public function withInvalidAudioURL(string $invalidAudioURL): self
    {
        $obj = clone $this;
        $obj['invalid_audio_url'] = $invalidAudioURL;

        return $obj;
    }

    /**
     * The media_name of a file to be played back when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withInvalidMediaName(string $invalidMediaName): self
    {
        $obj = clone $this;
        $obj['invalid_media_name'] = $invalidMediaName;

        return $obj;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $obj = clone $this;
        $obj['maximum_digits'] = $maximumDigits;

        return $obj;
    }

    /**
     * The maximum number of times the file should be played if there is no input from the user on the call.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $obj = clone $this;
        $obj['maximum_tries'] = $maximumTries;

        return $obj;
    }

    /**
     * The media_name of a file to be played back at the beginning of each prompt. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['media_name'] = $mediaName;

        return $obj;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $obj = clone $this;
        $obj['minimum_digits'] = $minimumDigits;

        return $obj;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $obj = clone $this;
        $obj['terminating_digit'] = $terminatingDigit;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for a DTMF response after file playback ends before a replaying the sound file.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $obj = clone $this;
        $obj['timeout_millis'] = $timeoutMillis;

        return $obj;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $obj = clone $this;
        $obj['valid_digits'] = $validDigits;

        return $obj;
    }
}
