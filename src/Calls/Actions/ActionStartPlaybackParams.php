<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartPlaybackParams\AudioType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Play an audio file on the call. If multiple play audio commands are issued consecutively,
 * the audio files will be placed in a queue awaiting playback.
 *
 * *Notes:*
 *
 * - When `overlay` is enabled, `target_legs` is limited to `self`.
 * - A customer cannot Play Audio with `overlay=true` unless there is a Play Audio with `overlay=false` actively playing.
 *
 * **Expected Webhooks:**
 *
 * - `call.playback.started`
 * - `call.playback.ended`
 *
 * @see Telnyx\Services\Calls\ActionsService::startPlayback()
 *
 * @phpstan-import-type LoopcountShape from \Telnyx\Calls\Actions\Loopcount
 *
 * @phpstan-type ActionStartPlaybackParamsShape = array{
 *   audioType?: null|AudioType|value-of<AudioType>,
 *   audioURL?: string|null,
 *   cacheAudio?: bool|null,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   loop?: LoopcountShape|null,
 *   mediaName?: string|null,
 *   overlay?: bool|null,
 *   playbackContent?: string|null,
 *   stop?: string|null,
 *   targetLegs?: string|null,
 * }
 */
final class ActionStartPlaybackParams implements BaseModel
{
    /** @use SdkModel<ActionStartPlaybackParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the type of audio provided in `audio_url` or `playback_content`.
     *
     * @var value-of<AudioType>|null $audioType
     */
    #[Optional('audio_type', enum: AudioType::class)]
    public ?string $audioType;

    /**
     * The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Optional('audio_url')]
    public ?string $audioURL;

    /**
     * Caches the audio file. Useful when playing the same audio file multiple times during the call.
     */
    #[Optional('cache_audio')]
    public ?bool $cacheAudio;

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
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    #[Optional]
    public string|int|null $loop;

    /**
     * The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     */
    #[Optional]
    public ?bool $overlay;

    /**
     * Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty.
     */
    #[Optional('playback_content')]
    public ?string $playbackContent;

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    #[Optional]
    public ?string $stop;

    /**
     * Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     */
    #[Optional('target_legs')]
    public ?string $targetLegs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AudioType|value-of<AudioType>|null $audioType
     * @param LoopcountShape|null $loop
     */
    public static function with(
        AudioType|string|null $audioType = null,
        ?string $audioURL = null,
        ?bool $cacheAudio = null,
        ?string $clientState = null,
        ?string $commandID = null,
        string|int|null $loop = null,
        ?string $mediaName = null,
        ?bool $overlay = null,
        ?string $playbackContent = null,
        ?string $stop = null,
        ?string $targetLegs = null,
    ): self {
        $self = new self;

        null !== $audioType && $self['audioType'] = $audioType;
        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $cacheAudio && $self['cacheAudio'] = $cacheAudio;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $loop && $self['loop'] = $loop;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $overlay && $self['overlay'] = $overlay;
        null !== $playbackContent && $self['playbackContent'] = $playbackContent;
        null !== $stop && $self['stop'] = $stop;
        null !== $targetLegs && $self['targetLegs'] = $targetLegs;

        return $self;
    }

    /**
     * Specifies the type of audio provided in `audio_url` or `playback_content`.
     *
     * @param AudioType|value-of<AudioType> $audioType
     */
    public function withAudioType(AudioType|string $audioType): self
    {
        $self = clone $this;
        $self['audioType'] = $audioType;

        return $self;
    }

    /**
     * The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

        return $self;
    }

    /**
     * Caches the audio file. Useful when playing the same audio file multiple times during the call.
     */
    public function withCacheAudio(bool $cacheAudio): self
    {
        $self = clone $this;
        $self['cacheAudio'] = $cacheAudio;

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
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     *
     * @param LoopcountShape $loop
     */
    public function withLoop(string|int $loop): self
    {
        $self = clone $this;
        $self['loop'] = $loop;

        return $self;
    }

    /**
     * The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     */
    public function withOverlay(bool $overlay): self
    {
        $self = clone $this;
        $self['overlay'] = $overlay;

        return $self;
    }

    /**
     * Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty.
     */
    public function withPlaybackContent(string $playbackContent): self
    {
        $self = clone $this;
        $self['playbackContent'] = $playbackContent;

        return $self;
    }

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    public function withStop(string $stop): self
    {
        $self = clone $this;
        $self['stop'] = $stop;

        return $self;
    }

    /**
     * Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     */
    public function withTargetLegs(string $targetLegs): self
    {
        $self = clone $this;
        $self['targetLegs'] = $targetLegs;

        return $self;
    }
}
