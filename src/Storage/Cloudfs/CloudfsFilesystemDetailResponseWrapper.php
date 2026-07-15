<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper\Data
 *
 * @phpstan-type CloudfsFilesystemDetailResponseWrapperShape = array{
 *   data?: null|Data|DataShape
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
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A CloudFS filesystem as returned by get, update, and delete. `meta_url` omits the credential and there is no `meta_token` field — the token is only returned by create and rotate-meta-token.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
