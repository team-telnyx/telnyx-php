<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\Actions\ActionRemoveResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A reference to a group that a user belongs to.
 *
 * @phpstan-type GroupShape = array{id: string, name: string}
 */
final class Group implements BaseModel
{
    /** @use SdkModel<GroupShape> */
    use SdkModel;

    /**
     * The unique identifier of the group.
     */
    #[Required]
    public string $id;

    /**
     * The name of the group.
     */
    #[Required]
    public string $name;

    /**
     * `new Group()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Group::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Group)->withID(...)->withName(...)
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
    public static function with(string $id, string $name): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The unique identifier of the group.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The name of the group.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
