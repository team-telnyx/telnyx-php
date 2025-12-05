<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionUnholdParams\Region;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Unhold a list of participants in a conference call.
 *
 * @see Telnyx\Services\Conferences\ActionsService::unhold()
 *
 * @phpstan-type ActionUnholdParamsShape = array{
 *   call_control_ids: list<string>, region?: Region|value-of<Region>
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
     * @var list<string> $call_control_ids
     */
    #[Api(list: 'string')]
    public array $call_control_ids;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
    public ?string $region;

    /**
     * `new ActionUnholdParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUnholdParams::with(call_control_ids: ...)
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
     * @param list<string> $call_control_ids
     * @param Region|value-of<Region> $region
     */
    public static function with(
        array $call_control_ids,
        Region|string|null $region = null
    ): self {
        $obj = new self;

        $obj['call_control_ids'] = $call_control_ids;

        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
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
