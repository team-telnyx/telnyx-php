<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionPlayParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Play audio to all or some participants on a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::play()
 *
 * @phpstan-type ActionPlayParamsShape = array{
 *   audio_url?: string,
 *   call_control_ids?: list<string>,
 *   loop?: string|int,
 *   media_name?: string,
 *   region?: Region|value-of<Region>,
 * }
 */
final class ActionPlayParams implements BaseModel
{
    /** @use SdkModel<ActionPlayParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     */
    #[Optional]
    public ?string $audio_url;

    /**
     * List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     *
     * @var list<string>|null $call_control_ids
     */
    #[Optional(list: 'string')]
    public ?array $call_control_ids;

    /**
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    #[Optional]
    public string|int|null $loop;

    /**
     * The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional]
    public ?string $media_name;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $call_control_ids
     * @param Region|value-of<Region> $region
     */
    public static function with(
        ?string $audio_url = null,
        ?array $call_control_ids = null,
        string|int|null $loop = null,
        ?string $media_name = null,
        Region|string|null $region = null,
    ): self {
        $obj = new self;

        null !== $audio_url && $obj['audio_url'] = $audio_url;
        null !== $call_control_ids && $obj['call_control_ids'] = $call_control_ids;
        null !== $loop && $obj['loop'] = $loop;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj['audio_url'] = $audioURL;

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
        $obj['call_control_ids'] = $callControlIDs;

        return $obj;
    }

    /**
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     */
    public function withLoop(string|int $loop): self
    {
        $obj = clone $this;
        $obj['loop'] = $loop;

        return $obj;
    }

    /**
     * The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['media_name'] = $mediaName;

        return $obj;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}
