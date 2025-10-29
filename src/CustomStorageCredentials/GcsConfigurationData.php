<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type GcsConfigurationDataShape = array{
 *   bucket?: string, credentials?: string
 * }
 */
final class GcsConfigurationData implements BaseModel
{
    /** @use SdkModel<GcsConfigurationDataShape> */
    use SdkModel;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $bucket = null,
        ?string $credentials = null
    ): self {
        $obj = new self;

        null !== $bucket && $obj->bucket = $bucket;
        null !== $credentials && $obj->credentials = $credentials;

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
