<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a namespace. An organization can have at most five, `default` among them — a sixth returns `403`.
 *
 * @see Telnyx\Services\AI\Memory\NamespacesService::create()
 *
 * @phpstan-type NamespaceCreateParamsShape = array{name: string}
 */
final class NamespaceCreateParams implements BaseModel
{
    /** @use SdkModel<NamespaceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the new namespace, unique within your organization.
     */
    #[Required]
    public string $name;

    /**
     * `new NamespaceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NamespaceCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NamespaceCreateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * A name for the new namespace, unique within your organization.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
