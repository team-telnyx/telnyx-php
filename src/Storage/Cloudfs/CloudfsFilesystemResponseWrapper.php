<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CloudfsFilesystemShape from \Telnyx\Storage\Cloudfs\CloudfsFilesystem
 *
 * @phpstan-type CloudfsFilesystemResponseWrapperShape = array{
 *   data?: null|CloudfsFilesystem|CloudfsFilesystemShape
 * }
 */
final class CloudfsFilesystemResponseWrapper implements BaseModel
{
    /** @use SdkModel<CloudfsFilesystemResponseWrapperShape> */
    use SdkModel;

    /**
     * A CloudFS filesystem, including its metadata credential. This shape is returned only by create and rotate-meta-token.
     */
    #[Optional]
    public ?CloudfsFilesystem $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CloudfsFilesystem|CloudfsFilesystemShape|null $data
     */
    public static function with(CloudfsFilesystem|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A CloudFS filesystem, including its metadata credential. This shape is returned only by create and rotate-meta-token.
     *
     * @param CloudfsFilesystem|CloudfsFilesystemShape $data
     */
    public function withData(CloudfsFilesystem|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
