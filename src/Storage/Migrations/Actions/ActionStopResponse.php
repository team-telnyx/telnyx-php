<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Migrations\MigrationParams;

/**
 * @phpstan-import-type MigrationParamsShape from \Telnyx\Storage\Migrations\MigrationParams
 *
 * @phpstan-type ActionStopResponseShape = array{
 *   data?: null|MigrationParams|MigrationParamsShape
 * }
 */
final class ActionStopResponse implements BaseModel
{
    /** @use SdkModel<ActionStopResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MigrationParams $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MigrationParamsShape $data
     */
    public static function with(MigrationParams|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MigrationParamsShape $data
     */
    public function withData(MigrationParams|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
