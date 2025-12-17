<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   failed?: list<string>|null,
 *   orderID?: string|null,
 *   pending?: list<string>|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   success?: list<string>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Phone numbers that failed to update.
     *
     * @var list<string>|null $failed
     */
    #[Optional(list: 'string')]
    public ?array $failed;

    /**
     * Order ID to verify bulk update status.
     */
    #[Optional('order_id')]
    public ?string $orderID;

    /**
     * Phone numbers pending to be updated.
     *
     * @var list<string>|null $pending
     */
    #[Optional(list: 'string')]
    public ?array $pending;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Phoned numbers updated successfully.
     *
     * @var list<string>|null $success
     */
    #[Optional(list: 'string')]
    public ?array $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $failed
     * @param list<string>|null $pending
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param list<string>|null $success
     */
    public static function with(
        ?array $failed = null,
        ?string $orderID = null,
        ?array $pending = null,
        RecordType|string|null $recordType = null,
        ?array $success = null,
    ): self {
        $self = new self;

        null !== $failed && $self['failed'] = $failed;
        null !== $orderID && $self['orderID'] = $orderID;
        null !== $pending && $self['pending'] = $pending;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * Phone numbers that failed to update.
     *
     * @param list<string> $failed
     */
    public function withFailed(array $failed): self
    {
        $self = clone $this;
        $self['failed'] = $failed;

        return $self;
    }

    /**
     * Order ID to verify bulk update status.
     */
    public function withOrderID(string $orderID): self
    {
        $self = clone $this;
        $self['orderID'] = $orderID;

        return $self;
    }

    /**
     * Phone numbers pending to be updated.
     *
     * @param list<string> $pending
     */
    public function withPending(array $pending): self
    {
        $self = clone $this;
        $self['pending'] = $pending;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Phoned numbers updated successfully.
     *
     * @param list<string> $success
     */
    public function withSuccess(array $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
