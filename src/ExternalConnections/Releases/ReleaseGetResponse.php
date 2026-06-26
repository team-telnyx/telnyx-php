<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReleaseShape from \Telnyx\ExternalConnections\Releases\Release
 *
 * @phpstan-type ReleaseGetResponseShape = array{data?: null|Release|ReleaseShape}
 */
final class ReleaseGetResponse implements BaseModel
{
    /** @use SdkModel<ReleaseGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Release $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Release|ReleaseShape|null $data
     */
    public static function with(Release|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Release|ReleaseShape $data
     */
    public function withData(Release|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
