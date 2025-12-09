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
     *   associatedRecordType?: string|null,
     *   associatedRecordTypeValue?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationChannelID?: string|null,
     *   notificationEventConditionID?: string|null,
     *   notificationProfileID?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<NotificationSetting|array{
     *   id?: string|null,
     *   associatedRecordType?: string|null,
     *   associatedRecordTypeValue?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationChannelID?: string|null,
     *   notificationEventConditionID?: string|null,
     *   notificationProfileID?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
