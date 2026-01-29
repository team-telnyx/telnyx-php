<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListResponse;

use Telnyx\AuditEvents\AuditEventListResponse\Change\From;
use Telnyx\AuditEvents\AuditEventListResponse\Change\To;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Details of the changes made to a resource.
 *
 * @phpstan-import-type FromVariants from \Telnyx\AuditEvents\AuditEventListResponse\Change\From
 * @phpstan-import-type ToVariants from \Telnyx\AuditEvents\AuditEventListResponse\Change\To
 * @phpstan-import-type FromShape from \Telnyx\AuditEvents\AuditEventListResponse\Change\From
 * @phpstan-import-type ToShape from \Telnyx\AuditEvents\AuditEventListResponse\Change\To
 *
 * @phpstan-type ChangeShape = array{
 *   field?: string|null, from?: FromShape|null, to?: ToShape|null
 * }
 */
final class Change implements BaseModel
{
    /** @use SdkModel<ChangeShape> */
    use SdkModel;

    /**
     * The name of the field that was changed. May use the dot notation to indicate nested fields.
     */
    #[Optional]
    public ?string $field;

    /**
     * The previous value of the field. Can be any JSON type.
     *
     * @var FromVariants|null $from
     */
    #[Optional(union: From::class, nullable: true)]
    public string|float|bool|array|null $from;

    /**
     * The new value of the field. Can be any JSON type.
     *
     * @var ToVariants|null $to
     */
    #[Optional(union: To::class, nullable: true)]
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
     * @param FromShape|null $from
     * @param ToShape|null $to
     */
    public static function with(
        ?string $field = null,
        string|float|bool|array|null $from = null,
        string|float|bool|array|null $to = null,
    ): self {
        $self = new self;

        null !== $field && $self['field'] = $field;
        null !== $from && $self['from'] = $from;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * The name of the field that was changed. May use the dot notation to indicate nested fields.
     */
    public function withField(string $field): self
    {
        $self = clone $this;
        $self['field'] = $field;

        return $self;
    }

    /**
     * The previous value of the field. Can be any JSON type.
     *
     * @param FromShape|null $from
     */
    public function withFrom(string|float|bool|array|null $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The new value of the field. Can be any JSON type.
     *
     * @param ToShape|null $to
     */
    public function withTo(string|float|bool|array|null $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
