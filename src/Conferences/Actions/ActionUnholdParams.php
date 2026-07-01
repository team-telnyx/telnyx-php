<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Unhold a list of participants in a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::unhold()
 *
 * @phpstan-type ActionUnholdParamsShape = array{
 *   callControlIDs: list<string>,
 *   region?: null|ConferenceRegion|value-of<ConferenceRegion>,
 * }
 */
final class ActionUnholdParams implements BaseModel
{
    /** @use SdkModel<ActionUnholdParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
     *
     * @var list<string> $callControlIDs
     */
    #[Required('call_control_ids', list: 'string')]
    public array $callControlIDs;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<ConferenceRegion>|null $region
     */
    #[Optional(enum: ConferenceRegion::class)]
    public ?string $region;

    /**
     * `new ActionUnholdParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUnholdParams::with(callControlIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionUnholdParams)->withCallControlIDs(...)
     * ```
     */
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
     * @param ConferenceRegion|value-of<ConferenceRegion>|null $region
     */
    public static function with(
        array $callControlIDs,
        ConferenceRegion|string|null $region = null
    ): self {
        $self = new self;

        $self['callControlIDs'] = $callControlIDs;

        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
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
     * @param ConferenceRegion|value-of<ConferenceRegion> $region
     */
    public function withRegion(ConferenceRegion|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
