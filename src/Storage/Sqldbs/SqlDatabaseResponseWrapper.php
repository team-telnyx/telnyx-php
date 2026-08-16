<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SqlDatabaseShape from \Telnyx\Storage\Sqldbs\SqlDatabase
 *
 * @phpstan-type SqlDatabaseResponseWrapperShape = array{
 *   data?: null|SqlDatabase|SqlDatabaseShape
 * }
 */
final class SqlDatabaseResponseWrapper implements BaseModel
{
    /** @use SdkModel<SqlDatabaseResponseWrapperShape> */
    use SdkModel;

    #[Optional]
    public ?SqlDatabase $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SqlDatabase|SqlDatabaseShape|null $data
     */
    public static function with(SqlDatabase|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SqlDatabase|SqlDatabaseShape $data
     */
    public function withData(SqlDatabase|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
