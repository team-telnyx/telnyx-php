<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification\Threshold;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification\Threshold\Unit;

/**
 * The SIM card individual data usage notification information.
 *
 * @phpstan-type SimCardDataUsageNotificationShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   sim_card_id?: string|null,
 *   threshold?: Threshold|null,
 *   updated_at?: string|null,
 * }
 */
final class SimCardDataUsageNotification implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    #[Optional]
    public ?string $record_type;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Optional]
    public ?string $sim_card_id;

    /**
     * Data usage threshold that will trigger the notification.
     */
    #[Optional]
    public ?Threshold $threshold;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Threshold|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $threshold
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $sim_card_id = null,
        Threshold|array|null $threshold = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $threshold && $obj['threshold'] = $threshold;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * Data usage threshold that will trigger the notification.
     *
     * @param Threshold|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $threshold
     */
    public function withThreshold(Threshold|array $threshold): self
    {
        $obj = clone $this;
        $obj['threshold'] = $threshold;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
