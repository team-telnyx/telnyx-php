<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new SQL database. Provisioning is asynchronous: the database is returned with status `pending` and becomes usable once it reaches `provision_ok`.
 *
 * @see Telnyx\Services\Storage\SqldbsService::create()
 *
 * @phpstan-type SqldbCreateParamsShape = array{name: string}
 */
final class SqldbCreateParams implements BaseModel
{
    /** @use SdkModel<SqldbCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Database name. Lowercase letters, numbers, and hyphens only; must start and end with a letter or number.
     */
    #[Required]
    public string $name;

    /**
     * `new SqldbCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SqldbCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SqldbCreateParams)->withName(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * Database name. Lowercase letters, numbers, and hyphens only; must start and end with a letter or number.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
