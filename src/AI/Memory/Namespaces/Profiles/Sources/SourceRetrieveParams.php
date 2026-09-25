<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One source and its content, as it was stored: an ingested session's payload or a remembered fact. A source whose ingest is still queued answers 404 until it has been stored.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\Profiles\SourcesService::retrieve()
 *
 * @phpstan-type SourceRetrieveParamsShape = array{
 *   namespace: string, profileID: string
 * }
 */
final class SourceRetrieveParams implements BaseModel
{
    /** @use SdkModel<SourceRetrieveParamsShape> */
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
     * `new SourceRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceRetrieveParams::with(namespace: ..., profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceRetrieveParams)->withNamespace(...)->withProfileID(...)
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
