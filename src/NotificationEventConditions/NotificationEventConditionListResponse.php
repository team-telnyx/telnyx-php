<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\Parameter;

/**
 * @phpstan-type NotificationEventConditionListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class NotificationEventConditionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NotificationEventConditionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

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
     *   allow_multiple_channels?: bool|null,
     *   associated_record_type?: value-of<AssociatedRecordType>|null,
     *   asynchronous?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   description?: string|null,
     *   enabled?: bool|null,
     *   name?: string|null,
     *   notification_event_id?: string|null,
     *   parameters?: list<Parameter>|null,
     *   supported_channels?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   allow_multiple_channels?: bool|null,
     *   associated_record_type?: value-of<AssociatedRecordType>|null,
     *   asynchronous?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   description?: string|null,
     *   enabled?: bool|null,
     *   name?: string|null,
     *   notification_event_id?: string|null,
     *   parameters?: list<Parameter>|null,
     *   supported_channels?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
