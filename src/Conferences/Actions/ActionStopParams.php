<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionStopParams\Region;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Stop audio being played to all or some participants on a conference call.
 *
 * @see Telnyx\Conferences\Actions->stop
 *
 * @phpstan-type action_stop_params = array{
 *   callControlIDs?: list<string>, region?: Region|value-of<Region>
 * }
 */
final class ActionStopParams implements BaseModel
{
    /** @use SdkModel<action_stop_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Api('call_control_ids', list: 'string', optional: true)]
    public ?array $callControlIDs;

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
     * @param list<string> $callControlIDs
     * @param Region|value-of<Region> $region
     */
    public static function with(
        ?array $callControlIDs = null,
        Region|string|null $region = null
    ): self {
        $obj = new self;

        null !== $callControlIDs && $obj->callControlIDs = $callControlIDs;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
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
