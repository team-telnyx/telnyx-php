<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NamespaceShape from \Telnyx\AI\Memory\Namespaces\Namespace_
 *
 * @phpstan-type NamespaceNewResponseShape = array{data: Namespace_|NamespaceShape}
 */
final class NamespaceNewResponse implements BaseModel
{
    /** @use SdkModel<NamespaceNewResponseShape> */
    use SdkModel;

    /**
     * An isolated memory store within your organization.
     */
    #[Required]
    public Namespace_ $data;

    /**
     * `new NamespaceNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NamespaceNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NamespaceNewResponse)->withData(...)
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
     * @param Namespace_|NamespaceShape $data
     */
    public static function with(Namespace_|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * An isolated memory store within your organization.
     *
     * @param Namespace_|NamespaceShape $data
     */
    public function withData(Namespace_|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
