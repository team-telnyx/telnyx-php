<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionPlayParams); // set properties as needed
 * $client->conferences.actions->play(...$params->toArray());
 * ```
 * Play audio to all or some participants on a conference call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conferences.actions->play(...$params->toArray());`
 *
 * @see Telnyx\Conferences\Actions->play
 *
 * @phpstan-type action_play_params = array{
 *   audioURL?: string,
 *   callControlIDs?: list<string>,
 *   loop?: string|int,
 *   mediaName?: string,
 * }
 */
final class ActionPlayParams implements BaseModel
{
    /** @use SdkModel<action_play_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     */
    #[Api('audio_url', optional: true)]
    public ?string $audioURL;

    /**
     * List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Api('call_control_ids', list: 'string', optional: true)]
    public ?array $callControlIDs;

    /**
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    #[Api(optional: true)]
    public string|int|null $loop;

    /**
     * The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $callControlIDs
     */
    public static function with(
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        string|int|null $loop = null,
        ?string $mediaName = null,
    ): self {
        $obj = new self;

        null !== $audioURL && $obj->audioURL = $audioURL;
        null !== $callControlIDs && $obj->callControlIDs = $callControlIDs;
        null !== $loop && $obj->loop = $loop;
        null !== $mediaName && $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audioURL = $audioURL;

        return $obj;
    }

    /**
     * List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $obj = clone $this;
        $obj->callControlIDs = $callControlIDs;

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
     * The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }
}
