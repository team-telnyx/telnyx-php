<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListResponse\Data;

use Telnyx\AuditEvents\AuditEventListResponse\Data\Change\From;
use Telnyx\AuditEvents\AuditEventListResponse\Data\Change\To;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Details of the changes made to a resource.
 *
 * @phpstan-type ChangeShape = array{
 *   field?: string,
 *   from?: string|float|bool|null|list<mixed>|array<string, mixed>,
 *   to?: string|float|bool|null|list<mixed>|array<string, mixed>,
 * }
 */
final class Change implements BaseModel
{
    /** @use SdkModel<ChangeShape> */
    use SdkModel;

    /**
     * The name of the field that was changed. May use the dot notation to indicate nested fields.
     */
    #[Api(optional: true)]
    public ?string $field;

    /**
     * The previous value of the field. Can be any JSON type.
     *
     * @var string|float|bool|list<mixed>|array<string, mixed>|null $from
     */
    #[Api(union: From::class, nullable: true, optional: true)]
    public string|float|bool|array|null $from;

    /**
     * The new value of the field. Can be any JSON type.
     *
     * @var string|float|bool|list<mixed>|array<string, mixed>|null $to
     */
    #[Api(union: To::class, nullable: true, optional: true)]
    public string|float|bool|array|null $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $from
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $to
     */
    public static function with(
        ?string $field = null,
        string|float|bool|array|null $from = null,
        string|float|bool|array|null $to = null,
    ): self {
        $obj = new self;

        null !== $field && $obj->field = $field;
        null !== $from && $obj->from = $from;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * The name of the field that was changed. May use the dot notation to indicate nested fields.
     */
    public function withField(string $field): self
    {
        $obj = clone $this;
        $obj->field = $field;

        return $obj;
    }

    /**
     * The previous value of the field. Can be any JSON type.
     *
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $from
     */
    public function withFrom(string|float|bool|array|null $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The new value of the field. Can be any JSON type.
     *
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $to
     */
    public function withTo(string|float|bool|array|null $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
