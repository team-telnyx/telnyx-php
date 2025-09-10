<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\ClientListObjectsParams\ListType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ClientListObjectsParams); // set properties as needed
 * $client->STAINLESS_FIXME_client->STAINLESS_FIXME_listObjects(...$params->toArray());
 * ```
 * List all objects contained in a given bucket.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->STAINLESS_FIXME_client->STAINLESS_FIXME_listObjects(...$params->toArray());`
 *
 * @see Telnyx->listObjects
 *
 * @phpstan-type client_list_objects_params = array{
 *   listType?: ListType|value-of<ListType>
 * }
 */
final class ClientListObjectsParams implements BaseModel
{
    /** @use SdkModel<client_list_objects_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<ListType>|null $listType */
    #[Api(enum: ListType::class, optional: true)]
    public ?int $listType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ListType|value-of<ListType> $listType
     */
    public static function with(ListType|int|null $listType = null): self
    {
        $obj = new self;

        null !== $listType && $obj->listType = $listType instanceof ListType ? $listType->value : $listType;

        return $obj;
    }

    /**
     * @param ListType|value-of<ListType> $listType
     */
    public function withListType(ListType|int $listType): self
    {
        $obj = clone $this;
        $obj->listType = $listType instanceof ListType ? $listType->value : $listType;

        return $obj;
    }
}
