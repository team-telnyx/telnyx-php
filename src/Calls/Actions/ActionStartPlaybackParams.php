<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartPlaybackParams\AudioType;
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\STAINLESS_FIXME_Calls\ActionsService::startPlayback()
 *
 * @phpstan-type ActionStartPlaybackParamsShape = array{
 *   audio_type?: AudioType|value-of<AudioType>,
 *   audio_url?: string,
 *   cache_audio?: bool,
 *   client_state?: string,
 *   command_id?: string,
 *   loop?: string|int,
 *   media_name?: string,
 *   overlay?: bool,
 *   playback_content?: string,
 *   stop?: string,
 *   target_legs?: string,
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
     * @var value-of<AudioType>|null $audio_type
     */
    #[Api(enum: AudioType::class, optional: true)]
    public ?string $audio_type;

    /**
     * The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Api(optional: true)]
    public ?string $audio_url;

    /**
     * Caches the audio file. Useful when playing the same audio file multiple times during the call.
     */
    #[Api(optional: true)]
    public ?bool $cache_audio;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    #[Api(optional: true)]
    public string|int|null $loop;

    /**
     * The media_name of a file to be played back on the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * When enabled, audio will be mixed on top of any other audio that is actively being played back. Note that `overlay: true` will only work if there is another audio file already being played on the call.
     */
    #[Api(optional: true)]
    public ?bool $overlay;

    /**
     * Allows a user to provide base64 encoded mp3 or wav. Note: when using this parameter, `media_url` and `media_name` in the `playback_started` and `playback_ended` webhooks will be empty.
     */
    #[Api(optional: true)]
    public ?string $playback_content;

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    #[Api(optional: true)]
    public ?string $stop;

    /**
     * Specifies the leg or legs on which audio will be played. If supplied, the value must be either `self`, `opposite` or `both`.
     */
    #[Api(optional: true)]
    public ?string $target_legs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AudioType|value-of<AudioType> $audio_type
     */
    public static function with(
        AudioType|string|null $audio_type = null,
        ?string $audio_url = null,
        ?bool $cache_audio = null,
        ?string $client_state = null,
        ?string $command_id = null,
        string|int|null $loop = null,
        ?string $media_name = null,
        ?bool $overlay = null,
        ?string $playback_content = null,
        ?string $stop = null,
        ?string $target_legs = null,
    ): self {
        $obj = new self;

        null !== $audio_type && $obj['audio_type'] = $audio_type;
        null !== $audio_url && $obj->audio_url = $audio_url;
        null !== $cache_audio && $obj->cache_audio = $cache_audio;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $loop && $obj->loop = $loop;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $overlay && $obj->overlay = $overlay;
        null !== $playback_content && $obj->playback_content = $playback_content;
        null !== $stop && $obj->stop = $stop;
        null !== $target_legs && $obj->target_legs = $target_legs;

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
        $obj['audio_type'] = $audioType;

        return $obj;
    }

    /**
     * The URL of a file to be played back on the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audio_url = $audioURL;

        return $obj;
    }

    /**
     * Caches the audio file. Useful when playing the same audio file multiple times during the call.
     */
    public function withCacheAudio(bool $cacheAudio): self
    {
        $obj = clone $this;
        $obj->cache_audio = $cacheAudio;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

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
        $obj->media_name = $mediaName;

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
        $obj->playback_content = $playbackContent;

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
        $obj->target_legs = $targetLegs;

        return $obj;
    }
}
