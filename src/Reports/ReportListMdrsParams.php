<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
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
 *   id?: string|null,
 *   cld?: string|null,
 *   cli?: string|null,
 *   direction?: null|Direction|value-of<Direction>,
 *   endDate?: string|null,
 *   messageType?: null|MessageType|value-of<MessageType>,
 *   profile?: string|null,
 *   startDate?: string|null,
 *   status?: null|Status|value-of<Status>,
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
    #[Optional]
    public ?string $id;

    /**
     * Destination number.
     */
    #[Optional]
    public ?string $cld;

    /**
     * Origination number.
     */
    #[Optional]
    public ?string $cli;

    /**
     * Direction (inbound or outbound).
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * Pagination end date.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Type of message.
     *
     * @var value-of<MessageType>|null $messageType
     */
    #[Optional(enum: MessageType::class)]
    public ?string $messageType;

    /**
     * Name of the profile.
     */
    #[Optional]
    public ?string $profile;

    /**
     * Pagination start date.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * Message status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
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
     * @param MessageType|value-of<MessageType> $messageType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $cld = null,
        ?string $cli = null,
        Direction|string|null $direction = null,
        ?string $endDate = null,
        MessageType|string|null $messageType = null,
        ?string $profile = null,
        ?string $startDate = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cld && $self['cld'] = $cld;
        null !== $cli && $self['cli'] = $cli;
        null !== $direction && $self['direction'] = $direction;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $messageType && $self['messageType'] = $messageType;
        null !== $profile && $self['profile'] = $profile;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Message uuid.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Destination number.
     */
    public function withCld(string $cld): self
    {
        $self = clone $this;
        $self['cld'] = $cld;

        return $self;
    }

    /**
     * Origination number.
     */
    public function withCli(string $cli): self
    {
        $self = clone $this;
        $self['cli'] = $cli;

        return $self;
    }

    /**
     * Direction (inbound or outbound).
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * Pagination end date.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Type of message.
     *
     * @param MessageType|value-of<MessageType> $messageType
     */
    public function withMessageType(MessageType|string $messageType): self
    {
        $self = clone $this;
        $self['messageType'] = $messageType;

        return $self;
    }

    /**
     * Name of the profile.
     */
    public function withProfile(string $profile): self
    {
        $self = clone $this;
        $self['profile'] = $profile;

        return $self;
    }

    /**
     * Pagination start date.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Message status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
