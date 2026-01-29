<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionMuteParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Mute a list of participants in a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::mute()
 *
 * @phpstan-type ActionMuteParamsShape = array{
 *   callControlIDs?: list<string>|null, region?: null|Region|value-of<Region>
 * }
 */
final class ActionMuteParams implements BaseModel
{
    /** @use SdkModel<ActionMuteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Optional('call_control_ids', list: 'string')]
    public ?array $callControlIDs;

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
     * @param list<string>|null $callControlIDs
     * @param Region|value-of<Region>|null $region
     */
    public static function with(
        ?array $callControlIDs = null,
        Region|string|null $region = null
    ): self {
        $self = new self;

        null !== $callControlIDs && $self['callControlIDs'] = $callControlIDs;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
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
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
