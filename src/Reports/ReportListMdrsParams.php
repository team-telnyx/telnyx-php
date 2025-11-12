<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListMdrsParams\Direction;
use Telnyx\Reports\ReportListMdrsParams\MessageType;
use Telnyx\Reports\ReportListMdrsParams\Status;

/**
 * Fetch all Mdr records.
 *
 * @see Telnyx\Services\ReportsService::listMdrs()
 *
 * @phpstan-type ReportListMdrsParamsShape = array{
 *   id?: string,
 *   cld?: string,
 *   cli?: string,
 *   direction?: Direction|value-of<Direction>,
 *   end_date?: string,
 *   message_type?: MessageType|value-of<MessageType>,
 *   profile?: string,
 *   start_date?: string,
 *   status?: Status|value-of<Status>,
 * }
 */
final class ReportListMdrsParams implements BaseModel
{
    /** @use SdkModel<ReportListMdrsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Message uuid.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Destination number.
     */
    #[Api(optional: true)]
    public ?string $cld;

    /**
     * Origination number.
     */
    #[Api(optional: true)]
    public ?string $cli;

    /**
     * Direction (inbound or outbound).
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * Pagination end date.
     */
    #[Api(optional: true)]
    public ?string $end_date;

    /**
     * Type of message.
     *
     * @var value-of<MessageType>|null $message_type
     */
    #[Api(enum: MessageType::class, optional: true)]
    public ?string $message_type;

    /**
     * Name of the profile.
     */
    #[Api(optional: true)]
    public ?string $profile;

    /**
     * Pagination start date.
     */
    #[Api(optional: true)]
    public ?string $start_date;

    /**
     * Message status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Direction|value-of<Direction> $direction
     * @param MessageType|value-of<MessageType> $message_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $cld = null,
        ?string $cli = null,
        Direction|string|null $direction = null,
        ?string $end_date = null,
        MessageType|string|null $message_type = null,
        ?string $profile = null,
        ?string $start_date = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $cld && $obj->cld = $cld;
        null !== $cli && $obj->cli = $cli;
        null !== $direction && $obj['direction'] = $direction;
        null !== $end_date && $obj->end_date = $end_date;
        null !== $message_type && $obj['message_type'] = $message_type;
        null !== $profile && $obj->profile = $profile;
        null !== $start_date && $obj->start_date = $start_date;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Message uuid.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Destination number.
     */
    public function withCld(string $cld): self
    {
        $obj = clone $this;
        $obj->cld = $cld;

        return $obj;
    }

    /**
     * Origination number.
     */
    public function withCli(string $cli): self
    {
        $obj = clone $this;
        $obj->cli = $cli;

        return $obj;
    }

    /**
     * Direction (inbound or outbound).
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * Pagination end date.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj->end_date = $endDate;

        return $obj;
    }

    /**
     * Type of message.
     *
     * @param MessageType|value-of<MessageType> $messageType
     */
    public function withMessageType(MessageType|string $messageType): self
    {
        $obj = clone $this;
        $obj['message_type'] = $messageType;

        return $obj;
    }

    /**
     * Name of the profile.
     */
    public function withProfile(string $profile): self
    {
        $obj = clone $this;
        $obj->profile = $profile;

        return $obj;
    }

    /**
     * Pagination start date.
     */
    public function withStartDate(string $startDate): self
    {
        $obj = clone $this;
        $obj->start_date = $startDate;

        return $obj;
    }

    /**
     * Message status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
