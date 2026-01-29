<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MigrationSourceParamsShape from \Telnyx\Storage\MigrationSources\MigrationSourceParams
 *
 * @phpstan-type MigrationSourceDeleteResponseShape = array{
 *   data?: null|MigrationSourceParams|MigrationSourceParamsShape
 * }
 */
final class MigrationSourceDeleteResponse implements BaseModel
{
    /** @use SdkModel<MigrationSourceDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MigrationSourceParams $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MigrationSourceParams|MigrationSourceParamsShape|null $data
     */
    public static function with(MigrationSourceParams|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MigrationSourceParams|MigrationSourceParamsShape $data
     */
    public function withData(MigrationSourceParams|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
