<?php

declare(strict_types=1);

namespace Telnyx\AI\AIGetModelsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string, created: int, owned_by: string, object?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public int $created;

    #[Api]
    public string $owned_by;

    #[Api(optional: true)]
    public ?string $object;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., created: ..., owned_by: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withCreated(...)->withOwnedBy(...)
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
     */
    public static function with(
        string $id,
        int $created,
        string $owned_by,
        ?string $object = null
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created'] = $created;
        $obj['owned_by'] = $owned_by;

        null !== $object && $obj['object'] = $object;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreated(int $created): self
    {
        $obj = clone $this;
        $obj['created'] = $created;

        return $obj;
    }

    public function withOwnedBy(string $ownedBy): self
    {
        $obj = clone $this;
        $obj['owned_by'] = $ownedBy;

        return $obj;
    }

    public function withObject(string $object): self
    {
        $obj = clone $this;
        $obj['object'] = $object;

        return $obj;
    }
}
