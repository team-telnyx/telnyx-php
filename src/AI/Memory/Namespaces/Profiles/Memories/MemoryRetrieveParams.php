<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Memories;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One memory by its id, as `recall` and the listing return it, together with what it came from. A fact names its `source_id`: read it with `GET .../sources/{source_id}` to see what was stored. A memory derived from other memories names them in `derived_from` instead; read each of those to reach its source.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\Profiles\MemoriesService::retrieve()
 *
 * @phpstan-type MemoryRetrieveParamsShape = array{
 *   namespace: string, profileID: string
 * }
 */
final class MemoryRetrieveParams implements BaseModel
{
    /** @use SdkModel<MemoryRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The namespace. `default` exists for every organization.
     */
    #[Required]
    public string $namespace;

    /**
     * The profile: your identifier for the user, caller or agent this memory is about.
     */
    #[Required]
    public string $profileID;

    /**
     * `new MemoryRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MemoryRetrieveParams::with(namespace: ..., profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MemoryRetrieveParams)->withNamespace(...)->withProfileID(...)
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
    public static function with(string $namespace, string $profileID): self
    {
        $self = new self;

        $self['namespace'] = $namespace;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * The namespace. `default` exists for every organization.
     */
    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }

    /**
     * The profile: your identifier for the user, caller or agent this memory is about.
     */
    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }
}
