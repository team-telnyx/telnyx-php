<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Whether a write has finished. Both `ingest` and `remember` return an `operation_id`, and a memory is not recallable until its operation completes — extraction, embedding and consolidation all run first.
 *
 * @see Telnyx\Services\AI\Memory\NamespacesService::retrieve()
 *
 * @phpstan-type NamespaceRetrieveParamsShape = array{namespace: string}
 */
final class NamespaceRetrieveParams implements BaseModel
{
    /** @use SdkModel<NamespaceRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $namespace;

    /**
     * `new NamespaceRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NamespaceRetrieveParams::with(namespace: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NamespaceRetrieveParams)->withNamespace(...)
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
    public static function with(string $namespace): self
    {
        $self = new self;

        $self['namespace'] = $namespace;

        return $self;
    }

    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }
}
