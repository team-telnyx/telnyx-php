<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An isolated memory store within your organization.
 *
 * @phpstan-type NamespaceShape = array{id: string, name: string}
 */
final class Namespace_ implements BaseModel
{
    /** @use SdkModel<NamespaceShape> */
    use SdkModel;

    /**
     * The namespace's unique identifier.
     */
    #[Required]
    public string $id;

    /**
     * The namespace's name, used in the path. `default` exists for every organization.
     */
    #[Required]
    public string $name;

    /**
     * `new Namespace_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Namespace_::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Namespace_)->withID(...)->withName(...)
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
     * The namespace's unique identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The namespace's name, used in the path. `default` exists for every organization.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
