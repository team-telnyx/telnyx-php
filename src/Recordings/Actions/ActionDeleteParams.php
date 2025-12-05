<?php

declare(strict_types=1);

namespace Telnyx\Recordings\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently deletes a list of call recordings.
 *
 * @see Telnyx\Services\Recordings\ActionsService::delete()
 *
 * @phpstan-type ActionDeleteParamsShape = array{ids: list<string>}
 */
final class ActionDeleteParams implements BaseModel
{
    /** @use SdkModel<ActionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of call recording IDs to delete.
     *
     * @var list<string> $ids
     */
    #[Api(list: 'string')]
    public array $ids;

    /**
     * `new ActionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionDeleteParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionDeleteParams)->withIDs(...)
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
     * @param list<string> $ids
     */
    public static function with(array $ids): self
    {
        $obj = new self;

        $obj['ids'] = $ids;

        return $obj;
    }

    /**
     * List of call recording IDs to delete.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj['ids'] = $ids;

        return $obj;
    }
}
