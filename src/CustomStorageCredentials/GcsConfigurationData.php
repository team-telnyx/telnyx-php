<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\GcsConfigurationData\Backend;

/**
 * @phpstan-type GcsConfigurationDataShape = array{
 *   backend: value-of<Backend>, bucket?: string|null, credentials?: string|null
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
    #[Api(enum: Backend::class)]
    public string $backend;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Api(optional: true)]
    public ?string $bucket;

    /**
     * Opaque credential token used to authenticate and authorize with storage provider.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj['backend'] = $backend;

        null !== $bucket && $obj->bucket = $bucket;
        null !== $credentials && $obj->credentials = $credentials;

        return $obj;
    }

    /**
     * Storage backend type.
     *
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $obj = clone $this;
        $obj['backend'] = $backend;

        return $obj;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    /**
     * Opaque credential token used to authenticate and authorize with storage provider.
     */
    public function withCredentials(string $credentials): self
    {
        $obj = clone $this;
        $obj->credentials = $credentials;

        return $obj;
    }
}
