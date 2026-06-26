<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Play audio to all or some participants on a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::play()
 *
 * @phpstan-import-type LoopcountVariants from \Telnyx\Calls\Actions\Loopcount
 * @phpstan-import-type LoopcountShape from \Telnyx\Calls\Actions\Loopcount
 *
 * @phpstan-type ActionPlayParamsShape = array{
 *   audioURL?: string|null,
 *   callControlIDs?: list<string>|null,
 *   loop?: LoopcountShape|null,
 *   mediaName?: string|null,
 *   region?: null|ConferenceRegion|value-of<ConferenceRegion>,
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
    #[Optional('audio_url')]
    public ?string $audioURL;

    /**
     * List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Optional('call_control_ids', list: 'string')]
    public ?array $callControlIDs;

    /**
     * The number of times the audio file should be played. If supplied, the value must be an integer between 1 and 100, or the special string `infinity` for an endless loop.
     *
     * @var LoopcountVariants|null $loop
     */
    #[Optional]
    public string|int|null $loop;

    /**
     * The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<ConferenceRegion>|null $region
     */
    #[Optional(enum: ConferenceRegion::class)]
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
     * @param list<string>|null $callControlIDs
     * @param LoopcountShape|null $loop
     * @param ConferenceRegion|value-of<ConferenceRegion>|null $region
     */
    public static function with(
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        string|int|null $loop = null,
        ?string $mediaName = null,
        ConferenceRegion|string|null $region = null,
    ): self {
        $self = new self;

        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $callControlIDs && $self['callControlIDs'] = $callControlIDs;
        null !== $loop && $self['loop'] = $loop;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * The URL of a file to be played back in the conference. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

        return $self;
    }

    /**
     * List of call control ids identifying participants the audio file should be played to. If not given, the audio file will be played to the entire conference.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $self = clone $this;
        $self['callControlIDs'] = $callControlIDs;

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
     * The media_name of a file to be played back in the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param ConferenceRegion|value-of<ConferenceRegion> $region
     */
    public function withRegion(ConferenceRegion|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
