<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\To;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingInboundMessagePayload\To\UnionMember0\LineType;
use Telnyx\Messages\MessagingInboundMessagePayload\To\UnionMember0\Status;

/**
 * @phpstan-type UnionMember0Shape = array{
 *   agentID?: string|null,
 *   agentName?: string|null,
 *   carrier?: string|null,
 *   lineType?: null|LineType|value-of<LineType>,
 *   phoneNumber?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class UnionMember0 implements BaseModel
{
    /** @use SdkModel<UnionMember0Shape> */
    use SdkModel;

    /**
     * RCS agent identifier.
     */
    #[Optional('agent_id')]
    public ?string $agentID;

    /**
     * RCS agent name.
     */
    #[Optional('agent_name')]
    public ?string $agentName;

    /**
     * The carrier of the receiver.
     */
    #[Optional]
    public ?string $carrier;

    /**
     * The line-type of the receiver.
     *
     * @var value-of<LineType>|null $lineType
     */
    #[Optional('line_type', enum: LineType::class)]
    public ?string $lineType;

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /** @var value-of<Status>|null $status */
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
     * @param LineType|value-of<LineType>|null $lineType
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $agentID = null,
        ?string $agentName = null,
        ?string $carrier = null,
        LineType|string|null $lineType = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $agentName && $self['agentName'] = $agentName;
        null !== $carrier && $self['carrier'] = $carrier;
        null !== $lineType && $self['lineType'] = $lineType;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * RCS agent identifier.
     */
    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * RCS agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $self = clone $this;
        $self['agentName'] = $agentName;

        return $self;
    }

    /**
     * The carrier of the receiver.
     */
    public function withCarrier(string $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    /**
     * The line-type of the receiver.
     *
     * @param LineType|value-of<LineType> $lineType
     */
    public function withLineType(LineType|string $lineType): self
    {
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
