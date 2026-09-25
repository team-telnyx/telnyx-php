<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes one source -- an ingested session or a remembered fact -- together with the memories derived from it. A memory derived from this source and others is deleted too, and derived again from what remains in the background. It answers only once the source is gone. A source that is not there -- never stored, another profile's, or already deleted -- answers 404, so on a `502` or a `504` repeat the identical request and read a 404 as done. An ingest of the same session that is still queued is not cancelled, and stores the session again when it runs. Nothing here can be undone.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\Profiles\SourcesService::delete()
 *
 * @phpstan-type SourceDeleteParamsShape = array{
 *   namespace: string, profileID: string
 * }
 */
final class SourceDeleteParams implements BaseModel
{
    /** @use SdkModel<SourceDeleteParamsShape> */
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
     * `new SourceDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceDeleteParams::with(namespace: ..., profileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceDeleteParams)->withNamespace(...)->withProfileID(...)
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
