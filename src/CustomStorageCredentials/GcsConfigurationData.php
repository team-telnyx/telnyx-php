<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\GcsConfigurationData\Backend;

/**
 * @phpstan-type GcsConfigurationDataShape = array{
 *   backend: Backend|value-of<Backend>,
 *   bucket?: string|null,
 *   credentials?: string|null,
 * }
 */
final class GcsConfigurationData implements BaseModel
{
    /** @use SdkModel<GcsConfigurationDataShape> */
    use SdkModel;

    /**
     * Storage backend type.
     *
     * @var value-of<Backend> $backend
     */
    #[Required(enum: Backend::class)]
    public string $backend;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Optional]
    public ?string $bucket;

    /**
     * Opaque credential token used to authenticate and authorize with storage provider.
     */
    #[Optional]
    public ?string $credentials;

    /**
     * `new GcsConfigurationData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GcsConfigurationData::with(backend: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GcsConfigurationData)->withBackend(...)
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
     * @param Backend|value-of<Backend> $backend
     */
    public static function with(
        Backend|string $backend,
        ?string $bucket = null,
        ?string $credentials = null
    ): self {
        $self = new self;

        $self['backend'] = $backend;

        null !== $bucket && $self['bucket'] = $bucket;
        null !== $credentials && $self['credentials'] = $credentials;

        return $self;
    }

    /**
     * Storage backend type.
     *
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $self = clone $this;
        $self['backend'] = $backend;

        return $self;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    /**
     * Opaque credential token used to authenticate and authorize with storage provider.
     */
    public function withCredentials(string $credentials): self
    {
        $self = clone $this;
        $self['credentials'] = $credentials;

        return $self;
    }
}
