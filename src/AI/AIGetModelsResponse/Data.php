<?php

declare(strict_types=1);

namespace Telnyx\AI\AIGetModelsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string, created: int, ownedBy: string, object?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public int $created;

    #[Required('owned_by')]
    public string $ownedBy;

    #[Optional]
    public ?string $object;

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
        ?string $object = null
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created'] = $created;
        $obj['ownedBy'] = $ownedBy;

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
        $obj['ownedBy'] = $ownedBy;

        return $obj;
    }

    public function withObject(string $object): self
    {
        $obj = clone $this;
        $obj['object'] = $object;

        return $obj;
    }
}
