<?php

declare(strict_types=1);

namespace Telnyx\AI\AIGetModelsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id: string, created: int, ownedBy: string, object1?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public int $created;

    #[Api('owned_by')]
    public string $ownedBy;

    #[Api(optional: true)]
    public ?string $object1;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., created: ..., ownedBy: ...)
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
        string $ownedBy,
        ?string $object1 = null
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->created = $created;
        $obj->ownedBy = $ownedBy;

        null !== $object1 && $obj->object1 = $object1;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreated(int $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    public function withOwnedBy(string $ownedBy): self
    {
        $obj = clone $this;
        $obj->ownedBy = $ownedBy;

        return $obj;
    }

    public function withObject(string $object1): self
    {
        $obj = clone $this;
        $obj->object1 = $object1;

        return $obj;
    }
}
