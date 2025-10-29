<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   failed?: list<string>,
 *   orderID?: string,
 *   pending?: list<string>,
 *   recordType?: value-of<RecordType>,
 *   success?: list<string>,
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
    #[Api(list: 'string', optional: true)]
    public ?array $failed;

    /**
     * Order ID to verify bulk update status.
     */
    #[Api('order_id', optional: true)]
    public ?string $orderID;

    /**
     * Phone numbers pending to be updated.
     *
     * @var list<string>|null $pending
     */
    #[Api(list: 'string', optional: true)]
    public ?array $pending;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /**
     * Phoned numbers updated successfully.
     *
     * @var list<string>|null $success
     */
    #[Api(list: 'string', optional: true)]
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
     * @param list<string> $failed
     * @param list<string> $pending
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $success
     */
    public static function with(
        ?array $failed = null,
        ?string $orderID = null,
        ?array $pending = null,
        RecordType|string|null $recordType = null,
        ?array $success = null,
    ): self {
        $obj = new self;

        null !== $failed && $obj->failed = $failed;
        null !== $orderID && $obj->orderID = $orderID;
        null !== $pending && $obj->pending = $pending;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $success && $obj->success = $success;

        return $obj;
    }

    /**
     * Phone numbers that failed to update.
     *
     * @param list<string> $failed
     */
    public function withFailed(array $failed): self
    {
        $obj = clone $this;
        $obj->failed = $failed;

        return $obj;
    }

    /**
     * Order ID to verify bulk update status.
     */
    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj->orderID = $orderID;

        return $obj;
    }

    /**
     * Phone numbers pending to be updated.
     *
     * @param list<string> $pending
     */
    public function withPending(array $pending): self
    {
        $obj = clone $this;
        $obj->pending = $pending;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Phoned numbers updated successfully.
     *
     * @param list<string> $success
     */
    public function withSuccess(array $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
