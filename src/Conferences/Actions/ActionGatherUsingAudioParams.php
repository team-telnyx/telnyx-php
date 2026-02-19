<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Play an audio file to a specific conference participant and gather DTMF input.
 *
 * @see Telnyx\Services\Conferences\ActionsService::gatherUsingAudio()
 *
 * @phpstan-type ActionGatherUsingAudioParamsShape = array{
 *   callControlID: string,
 *   audioURL?: string|null,
 *   clientState?: string|null,
 *   gatherID?: string|null,
 *   initialTimeoutMillis?: int|null,
 *   interDigitTimeoutMillis?: int|null,
 *   invalidAudioURL?: string|null,
 *   invalidMediaName?: string|null,
 *   maximumDigits?: int|null,
 *   maximumTries?: int|null,
 *   mediaName?: string|null,
 *   minimumDigits?: int|null,
 *   stopPlaybackOnDtmf?: bool|null,
 *   terminatingDigit?: string|null,
 *   timeoutMillis?: int|null,
 *   validDigits?: string|null,
 * }
 */
final class ActionGatherUsingAudioParams implements BaseModel
{
    /** @use SdkModel<ActionGatherUsingAudioParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call leg that will receive the gather prompt.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * The URL of the audio file to play as the gather prompt. Must be WAV or MP3 format.
     */
    #[Optional('audio_url')]
    public ?string $audioURL;

    /**
     * Use this field to add state to every subsequent webhook. Must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Identifier for this gather command. Will be included in the gather ended webhook. Maximum 100 characters.
     */
    #[Optional('gather_id')]
    public ?string $gatherID;

    /**
     * Duration in milliseconds to wait for the first digit before timing out.
     */
    #[Optional('initial_timeout_millis')]
    public ?int $initialTimeoutMillis;

    /**
     * Duration in milliseconds to wait between digits.
     */
    #[Optional('inter_digit_timeout_millis')]
    public ?int $interDigitTimeoutMillis;

    /**
     * URL of audio file to play when invalid input is received.
     */
    #[Optional('invalid_audio_url')]
    public ?string $invalidAudioURL;

    /**
     * Name of media file to play when invalid input is received.
     */
    #[Optional('invalid_media_name')]
    public ?string $invalidMediaName;

    /**
     * Maximum number of digits to gather.
     */
    #[Optional('maximum_digits')]
    public ?int $maximumDigits;

    /**
     * Maximum number of times to play the prompt if no input is received.
     */
    #[Optional('maximum_tries')]
    public ?int $maximumTries;

    /**
     * The name of the media file uploaded to the Media Storage API to play as the gather prompt.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * Minimum number of digits to gather.
     */
    #[Optional('minimum_digits')]
    public ?int $minimumDigits;

    /**
     * Whether to stop the audio playback when a DTMF digit is received.
     */
    #[Optional('stop_playback_on_dtmf')]
    public ?bool $stopPlaybackOnDtmf;

    /**
     * Digit that terminates gathering.
     */
    #[Optional('terminating_digit')]
    public ?string $terminatingDigit;

    /**
     * Duration in milliseconds to wait for input before timing out.
     */
    #[Optional('timeout_millis')]
    public ?int $timeoutMillis;

    /**
     * Digits that are valid for gathering. All other digits will be ignored.
     */
    #[Optional('valid_digits')]
    public ?string $validDigits;

    /**
     * `new ActionGatherUsingAudioParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionGatherUsingAudioParams::with(callControlID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionGatherUsingAudioParams)->withCallControlID(...)
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
     */
    public static function with(
        string $callControlID,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $gatherID = null,
        ?int $initialTimeoutMillis = null,
        ?int $interDigitTimeoutMillis = null,
        ?string $invalidAudioURL = null,
        ?string $invalidMediaName = null,
        ?int $maximumDigits = null,
        ?int $maximumTries = null,
        ?string $mediaName = null,
        ?int $minimumDigits = null,
        ?bool $stopPlaybackOnDtmf = null,
        ?string $terminatingDigit = null,
        ?int $timeoutMillis = null,
        ?string $validDigits = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;

        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $gatherID && $self['gatherID'] = $gatherID;
        null !== $initialTimeoutMillis && $self['initialTimeoutMillis'] = $initialTimeoutMillis;
        null !== $interDigitTimeoutMillis && $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;
        null !== $invalidAudioURL && $self['invalidAudioURL'] = $invalidAudioURL;
        null !== $invalidMediaName && $self['invalidMediaName'] = $invalidMediaName;
        null !== $maximumDigits && $self['maximumDigits'] = $maximumDigits;
        null !== $maximumTries && $self['maximumTries'] = $maximumTries;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $minimumDigits && $self['minimumDigits'] = $minimumDigits;
        null !== $stopPlaybackOnDtmf && $self['stopPlaybackOnDtmf'] = $stopPlaybackOnDtmf;
        null !== $terminatingDigit && $self['terminatingDigit'] = $terminatingDigit;
        null !== $timeoutMillis && $self['timeoutMillis'] = $timeoutMillis;
        null !== $validDigits && $self['validDigits'] = $validDigits;

        return $self;
    }

    /**
     * Unique identifier and token for controlling the call leg that will receive the gather prompt.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * The URL of the audio file to play as the gather prompt. Must be WAV or MP3 format.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. Must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Identifier for this gather command. Will be included in the gather ended webhook. Maximum 100 characters.
     */
    public function withGatherID(string $gatherID): self
    {
        $self = clone $this;
        $self['gatherID'] = $gatherID;

        return $self;
    }

    /**
     * Duration in milliseconds to wait for the first digit before timing out.
     */
    public function withInitialTimeoutMillis(int $initialTimeoutMillis): self
    {
        $self = clone $this;
        $self['initialTimeoutMillis'] = $initialTimeoutMillis;

        return $self;
    }

    /**
     * Duration in milliseconds to wait between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $self = clone $this;
        $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;

        return $self;
    }

    /**
     * URL of audio file to play when invalid input is received.
     */
    public function withInvalidAudioURL(string $invalidAudioURL): self
    {
        $self = clone $this;
        $self['invalidAudioURL'] = $invalidAudioURL;

        return $self;
    }

    /**
     * Name of media file to play when invalid input is received.
     */
    public function withInvalidMediaName(string $invalidMediaName): self
    {
        $self = clone $this;
        $self['invalidMediaName'] = $invalidMediaName;

        return $self;
    }

    /**
     * Maximum number of digits to gather.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $self = clone $this;
        $self['maximumDigits'] = $maximumDigits;

        return $self;
    }

    /**
     * Maximum number of times to play the prompt if no input is received.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $self = clone $this;
        $self['maximumTries'] = $maximumTries;

        return $self;
    }

    /**
     * The name of the media file uploaded to the Media Storage API to play as the gather prompt.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * Minimum number of digits to gather.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $self = clone $this;
        $self['minimumDigits'] = $minimumDigits;

        return $self;
    }

    /**
     * Whether to stop the audio playback when a DTMF digit is received.
     */
    public function withStopPlaybackOnDtmf(bool $stopPlaybackOnDtmf): self
    {
        $self = clone $this;
        $self['stopPlaybackOnDtmf'] = $stopPlaybackOnDtmf;

        return $self;
    }

    /**
     * Digit that terminates gathering.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $self = clone $this;
        $self['terminatingDigit'] = $terminatingDigit;

        return $self;
    }

    /**
     * Duration in milliseconds to wait for input before timing out.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $self = clone $this;
        $self['timeoutMillis'] = $timeoutMillis;

        return $self;
    }

    /**
     * Digits that are valid for gathering. All other digits will be ignored.
     */
    public function withValidDigits(string $validDigits): self
    {
        $self = clone $this;
        $self['validDigits'] = $validDigits;

        return $self;
    }
}
