<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSetting\Parameter;
use Telnyx\NotificationSettings\NotificationSetting\Status;

/**
 * @phpstan-type NotificationSettingListResponseShape = array{
 *   data?: list<NotificationSetting>|null, meta?: PaginationMeta|null
 * }
 */
final class NotificationSettingListResponse implements BaseModel
{
    /** @use SdkModel<NotificationSettingListResponseShape> */
    use SdkModel;

    /** @var list<NotificationSetting>|null $data */
    #[Optional(list: NotificationSetting::class)]
    public ?array $data;

    #[Optional]
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
     * @param list<NotificationSetting|array{
     *   id?: string|null,
     *   associated_record_type?: string|null,
     *   associated_record_type_value?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_channel_id?: string|null,
     *   notification_event_condition_id?: string|null,
     *   notification_profile_id?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
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
     * @param list<NotificationSetting|array{
     *   id?: string|null,
     *   associated_record_type?: string|null,
     *   associated_record_type_value?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_channel_id?: string|null,
     *   notification_event_condition_id?: string|null,
     *   notification_profile_id?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
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
