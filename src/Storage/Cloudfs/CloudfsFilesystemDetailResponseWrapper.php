<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CloudfsFilesystemDetailShape from \Telnyx\Storage\Cloudfs\CloudfsFilesystemDetail
 *
 * @phpstan-type CloudfsFilesystemDetailResponseWrapperShape = array{
 *   data?: null|CloudfsFilesystemDetail|CloudfsFilesystemDetailShape
 * }
 */
final class CloudfsFilesystemDetailResponseWrapper implements BaseModel
{
    /** @use SdkModel<CloudfsFilesystemDetailResponseWrapperShape> */
    use SdkModel;

    /**
     * A CloudFS filesystem as returned by get, update, and delete. `meta_url` omits the credential and there is no `meta_token` field — the token is only returned by create and rotate-meta-token.
     */
    #[Optional]
    public ?CloudfsFilesystemDetail $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CloudfsFilesystemDetail|CloudfsFilesystemDetailShape|null $data
     */
    public static function with(
        CloudfsFilesystemDetail|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A CloudFS filesystem as returned by get, update, and delete. `meta_url` omits the credential and there is no `meta_token` field — the token is only returned by create and rotate-meta-token.
     *
     * @param CloudfsFilesystemDetail|CloudfsFilesystemDetailShape $data
     */
    public function withData(CloudfsFilesystemDetail|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
