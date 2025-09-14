<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\ClientDeleteObjectsParams\Body;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes one or multiple objects from a given bucket.
 *
 * @see Telnyx->deleteObjects
 *
 * @phpstan-type client_delete_objects_params = array{
 *   delete: bool, body: list<Body>
 * }
 */
final class ClientDeleteObjectsParams implements BaseModel
{
    /** @use SdkModel<client_delete_objects_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public bool $delete;

    /** @var list<Body> $body */
    #[Api(list: Body::class)]
    public array $body;

    /**
     * `new ClientDeleteObjectsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientDeleteObjectsParams::with(delete: ..., body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientDeleteObjectsParams)->withDelete(...)->withBody(...)
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
     * @param list<Body> $body
     */
    public static function with(bool $delete, array $body): self
    {
        $obj = new self;

        $obj->delete = $delete;
        $obj->body = $body;

        return $obj;
    }

    public function withDelete(bool $delete): self
    {
        $obj = clone $this;
        $obj->delete = $delete;

        return $obj;
    }

    /**
     * @param list<Body> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
