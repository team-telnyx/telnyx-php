<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents;

use Telnyx\AuditEvents\AuditEventListResponse\Data;
use Telnyx\AuditEvents\AuditEventListResponse\Data\Change;
use Telnyx\AuditEvents\AuditEventListResponse\Data\ChangeMadeBy;
use Telnyx\AuditEvents\AuditEventListResponse\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuditEventListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class AuditEventListResponse implements BaseModel
{
    /** @use SdkModel<AuditEventListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: string|null,
     *   alternate_resource_id?: string|null,
     *   change_made_by?: value-of<ChangeMadeBy>|null,
     *   change_type?: string|null,
     *   changes?: list<Change>|null,
     *   created_at?: \DateTimeInterface|null,
     *   organization_id?: string|null,
     *   record_type?: string|null,
     *   resource_id?: string|null,
     *   user_id?: string|null,
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   alternate_resource_id?: string|null,
     *   change_made_by?: value-of<ChangeMadeBy>|null,
     *   change_type?: string|null,
     *   changes?: list<Change>|null,
     *   created_at?: \DateTimeInterface|null,
     *   organization_id?: string|null,
     *   record_type?: string|null,
     *   resource_id?: string|null,
     *   user_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
