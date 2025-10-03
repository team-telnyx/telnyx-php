<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartPlaybackParams\AudioType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionStartPlaybackParams); // set properties as needed
 * $client->calls.actions->startPlayback(...$params->toArray());
 * ```
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
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->startPlayback(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->startPlayback
 *
 * @phpstan-type action_start_playback_params = array{
 *   audioType?: AudioType|value-of<AudioType>,
 *   audioURL?: string,
 *   cacheAudio?: bool,
 *   clientState?: string,
 *   commandID?: string,
 *   loop?: string|int,
 *   mediaName?: string,
 *   overlay?: bool,
 *   playbackContent?: string,
 *   stop?: string,
 *   targetLegs?: string,
 * }
 */
final class ActionStartPlaybackParams implements BaseModel
{
    /** @use SdkModel<action_start_playback_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the type of audio provided in `audio_url` or `playback_content`.
     *
     * @var value-of<AudioType>|null $audioType
     */
    #[Api('audio_type', enum: AudioType::class, optional: true)]
    public ?string $audioType;

    /**
     * The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Api('audio_url', optional: true)]
    public ?string $audioURL;

    /**
     * Caches the audio file. Useful when playing the same audio file multiple times during the call.
     */
    #[Api('cache_audio', optional: true)]
    public ?bool $cacheAudio;

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
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    #[Api(optional: true)]
    public string|int|null $loop;

    /**
     * The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     */
    #[Api(optional: true)]
    public ?bool $overlay;

    /**
     * Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty.
     */
    #[Api('playback_content', optional: true)]
    public ?string $playbackContent;

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    #[Api(optional: true)]
    public ?string $stop;

    /**
     * Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     */
    #[Api('target_legs', optional: true)]
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
     * @param AudioType|value-of<AudioType> $audioType
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
        $obj = new self;

        null !== $audioType && $obj['audioType'] = $audioType;
        null !== $audioURL && $obj->audioURL = $audioURL;
        null !== $cacheAudio && $obj->cacheAudio = $cacheAudio;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $loop && $obj->loop = $loop;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $overlay && $obj->overlay = $overlay;
        null !== $playbackContent && $obj->playbackContent = $playbackContent;
        null !== $stop && $obj->stop = $stop;
        null !== $targetLegs && $obj->targetLegs = $targetLegs;

        return $obj;
    }

    /**
     * Specifies the type of audio provided in `audio_url` or `playback_content`.
     *
     * @param AudioType|value-of<AudioType> $audioType
     */
    public function withAudioType(AudioType|string $audioType): self
    {
        $obj = clone $this;
        $obj['audioType'] = $audioType;

        return $obj;
    }

    /**
     * The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audioURL = $audioURL;

        return $obj;
    }

    /**
     * Caches the audio file. Useful when playing the same audio file multiple times during the call.
     */
    public function withCacheAudio(bool $cacheAudio): self
    {
        $obj = clone $this;
        $obj->cacheAudio = $cacheAudio;

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
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    public function withLoop(string|int $loop): self
    {
        $obj = clone $this;
        $obj->loop = $loop;

        return $obj;
    }

    /**
     * The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     */
    public function withOverlay(bool $overlay): self
    {
        $obj = clone $this;
        $obj->overlay = $overlay;

        return $obj;
    }

    /**
     * Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty.
     */
    public function withPlaybackContent(string $playbackContent): self
    {
        $obj = clone $this;
        $obj->playbackContent = $playbackContent;

        return $obj;
    }

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    public function withStop(string $stop): self
    {
        $obj = clone $this;
        $obj->stop = $stop;

        return $obj;
    }

    /**
     * Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     */
    public function withTargetLegs(string $targetLegs): self
    {
        $obj = clone $this;
        $obj->targetLegs = $targetLegs;

        return $obj;
    }
}
