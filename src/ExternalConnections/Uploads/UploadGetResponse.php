<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UploadShape from \Telnyx\ExternalConnections\Uploads\Upload
 *
 * @phpstan-type UploadGetResponseShape = array{data?: null|Upload|UploadShape}
 */
final class UploadGetResponse implements BaseModel
{
    /** @use SdkModel<UploadGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Upload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UploadShape $data
     */
    public static function with(Upload|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param UploadShape $data
     */
    public function withData(Upload|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
