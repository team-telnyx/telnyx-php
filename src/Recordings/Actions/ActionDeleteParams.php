<?php

declare(strict_types=1);

namespace Telnyx\Recordings\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionDeleteParams); // set properties as needed
 * $client->recordings.actions->delete(...$params->toArray());
 * ```
 * Permanently deletes a list of call recordings.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->recordings.actions->delete(...$params->toArray());`
 *
 * @see Telnyx\Recordings\Actions->delete
 *
 * @phpstan-type action_delete_params = array{ids: list<string>}
 */
final class ActionDeleteParams implements BaseModel
{
    /** @use SdkModel<action_delete_params> */
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

        $obj->ids = $ids;

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
        $obj->ids = $ids;

        return $obj;
    }
}
