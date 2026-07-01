<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Hold a list of participants in a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::hold()
 *
 * @phpstan-type ActionHoldParamsShape = array{
 *   audioURL?: string|null,
 *   callControlIDs?: list<string>|null,
 *   mediaName?: string|null,
 *   region?: null|ConferenceRegion|value-of<ConferenceRegion>,
 * }
 */
final class ActionHoldParams implements BaseModel
{
    /** @use SdkModel<ActionHoldParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     */
    #[Optional('audio_url')]
    public ?string $audioURL;

    /**
     * List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Optional('call_control_ids', list: 'string')]
    public ?array $callControlIDs;

    /**
     * The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
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
     * @param ConferenceRegion|value-of<ConferenceRegion>|null $region
     */
    public static function with(
        ?string $audioURL = null,
        ?array $callControlIDs = null,
        ?string $mediaName = null,
        ConferenceRegion|string|null $region = null,
    ): self {
        $self = new self;

        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $callControlIDs && $self['callControlIDs'] = $callControlIDs;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

        return $self;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
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
     * The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
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
