<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionHoldParams\Region;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Hold a list of participants in a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::hold()
 *
 * @phpstan-type ActionHoldParamsShape = array{
 *   audio_url?: string,
 *   call_control_ids?: list<string>,
 *   media_name?: string,
 *   region?: Region|value-of<Region>,
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
    #[Api(optional: true)]
    public ?string $audio_url;

    /**
     * List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
     *
     * @var list<string>|null $call_control_ids
     */
    #[Api(list: 'string', optional: true)]
    public ?array $call_control_ids;

    /**
     * The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
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
        ?string $media_name = null,
        Region|string|null $region = null,
    ): self {
        $obj = new self;

        null !== $audio_url && $obj['audio_url'] = $audio_url;
        null !== $call_control_ids && $obj['call_control_ids'] = $call_control_ids;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * The URL of a file to be played to the participants when they are put on hold. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj['audio_url'] = $audioURL;

        return $obj;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. When empty all participants will be placed on hold.
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
     * The media_name of a file to be played to the participants when they are put on hold. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
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
