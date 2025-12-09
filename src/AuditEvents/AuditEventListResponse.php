<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents;

use Telnyx\AuditEvents\AuditEventListResponse\Data;
use Telnyx\AuditEvents\AuditEventListResponse\Data\Change;
use Telnyx\AuditEvents\AuditEventListResponse\Data\ChangeMadeBy;
use Telnyx\AuditEvents\AuditEventListResponse\Meta;
use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
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
     *   alternateResourceID?: string|null,
     *   changeMadeBy?: value-of<ChangeMadeBy>|null,
     *   changeType?: string|null,
     *   changes?: list<Change>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   resourceID?: string|null,
     *   userID?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   alternateResourceID?: string|null,
     *   changeMadeBy?: value-of<ChangeMadeBy>|null,
     *   changeType?: string|null,
     *   changes?: list<Change>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   resourceID?: string|null,
     *   userID?: string|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
