<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a SQL database and all of the data it holds. Deletion is asynchronous and returns `202` with an empty body — the record is not removed synchronously. Poll `GET /storage/sqldbs/{id}`, which returns `404` once the database has been purged; there is no durable `deleted` state. A database still bound by a function is refused with `409` unless `force=true`.
 *
 * @see Telnyx\Services\Storage\SqldbsService::delete()
 *
 * @phpstan-type SqldbDeleteParamsShape = array{force?: bool|null}
 */
final class SqldbDeleteParams implements BaseModel
{
    /** @use SdkModel<SqldbDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Delete the database even when functions still bind it. Their bindings stop resolving.
     */
    #[Optional]
    public ?bool $force;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $force = null): self
    {
        $self = new self;

        null !== $force && $self['force'] = $force;

        return $self;
    }

    /**
     * Delete the database even when functions still bind it. Their bindings stop resolving.
     */
    public function withForce(bool $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }
}
