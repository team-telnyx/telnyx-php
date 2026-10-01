<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NamespaceShape from \Telnyx\AI\Memory\Namespaces\Namespace_
 *
 * @phpstan-type NamespaceListResponseShape = array{
 *   data: list<Namespace_|NamespaceShape>
 * }
 */
final class NamespaceListResponse implements BaseModel
{
    /** @use SdkModel<NamespaceListResponseShape> */
    use SdkModel;

    /** @var list<Namespace_> $data */
    #[Required(list: Namespace_::class)]
    public array $data;

    /**
     * `new NamespaceListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NamespaceListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NamespaceListResponse)->withData(...)
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
     * @param list<Namespace_|NamespaceShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Namespace_|NamespaceShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
