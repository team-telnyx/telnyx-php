<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryParams\Param;

/**
 * Runs SQL against the database and returns the resulting rows — empty for statements that return none, such as DDL. Bind positional `?` placeholders with `params` rather than interpolating values into the SQL string.
 *
 * @see Telnyx\Services\Storage\Sqldbs\ActionsService::query()
 *
 * @phpstan-import-type ParamVariants from \Telnyx\Storage\Sqldbs\Actions\ActionQueryParams\Param
 * @phpstan-import-type ParamShape from \Telnyx\Storage\Sqldbs\Actions\ActionQueryParams\Param
 *
 * @phpstan-type ActionQueryParamsShape = array{
 *   sql: string, params?: list<ParamShape>|null
 * }
 */
final class ActionQueryParams implements BaseModel
{
    /** @use SdkModel<ActionQueryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The SQL to run. Use positional `?` placeholders and supply the values in `params` rather than interpolating them into this string.
     */
    #[Required]
    public string $sql;

    /**
     * Positional bind parameters, in placeholder order. Each value is a string, a number, a boolean, or null; booleans are cast to `1`/`0`. The count must match the number of `?` placeholders exactly — a mismatch is rejected with 422 rather than binding null for the ones you left out. (Not enforced for multi-statement scripts or named parameters, where the placeholder count is not the number bound.).
     *
     * @var list<ParamVariants>|null $params
     */
    #[Optional(list: Param::class)]
    public ?array $params;

    /**
     * `new ActionQueryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionQueryParams::with(sql: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionQueryParams)->withSql(...)
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
     *
     * @param list<ParamShape>|null $params
     */
    public static function with(string $sql, ?array $params = null): self
    {
        $self = new self;

        $self['sql'] = $sql;

        null !== $params && $self['params'] = $params;

        return $self;
    }

    /**
     * The SQL to run. Use positional `?` placeholders and supply the values in `params` rather than interpolating them into this string.
     */
    public function withSql(string $sql): self
    {
        $self = clone $this;
        $self['sql'] = $sql;

        return $self;
    }

    /**
     * Positional bind parameters, in placeholder order. Each value is a string, a number, a boolean, or null; booleans are cast to `1`/`0`. The count must match the number of `?` placeholders exactly — a mismatch is rejected with 422 rather than binding null for the ones you left out. (Not enforced for multi-statement scripts or named parameters, where the placeholder count is not the number bound.).
     *
     * @param list<ParamShape> $params
     */
    public function withParams(array $params): self
    {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }
}
