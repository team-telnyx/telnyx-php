<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListMdrsResponse\Data\Currency;
use Telnyx\Reports\ReportListMdrsResponse\Data\MessageType;
use Telnyx\Reports\ReportListMdrsResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   cld?: string|null,
 *   cli?: string|null,
 *   cost?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   currency?: null|Currency|value-of<Currency>,
 *   direction?: string|null,
 *   messageType?: null|MessageType|value-of<MessageType>,
 *   parts?: float|null,
 *   profileName?: string|null,
 *   rate?: string|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Id of message detail record.
     */
    #[Optional]
    public ?string $id;

    /**
     * The destination number for a call, or the callee.
     */
    #[Optional]
    public ?string $cld;

    /**
     * The number associated with the person initiating the call, or the caller.
     */
    #[Optional]
    public ?string $cli;

    /**
     * Final cost. Cost is calculated as rate * parts.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Message sent time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Currency of the rate and cost.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Optional(enum: Currency::class)]
    public ?string $currency;

    /**
     * Direction of message - inbound or outbound.
     */
    #[Optional]
    public ?string $direction;

    /**
     * Type of message.
     *
     * @var value-of<MessageType>|null $messageType
     */
    #[Optional('message_type', enum: MessageType::class)]
    public ?string $messageType;

    /**
     * Number of parts this message has. Max number of character is 160. If message contains more characters then that it will be broken down in multiple parts.
     */
    #[Optional]
    public ?float $parts;

    /**
     * Configured profile name. New profiles can be created and configured on Telnyx portal.
     */
    #[Optional('profile_name')]
    public ?string $profileName;

    /**
     * Rate applied to the message.
     */
    #[Optional]
    public ?string $rate;

    #[Optional('record_type')]
    public ?string $recordType;

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
     * @param Currency|value-of<Currency> $currency
     * @param MessageType|value-of<MessageType> $messageType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $cld = null,
        ?string $cli = null,
        ?string $cost = null,
        ?\DateTimeInterface $createdAt = null,
        Currency|string|null $currency = null,
        ?string $direction = null,
        MessageType|string|null $messageType = null,
        ?float $parts = null,
        ?string $profileName = null,
        ?string $rate = null,
        ?string $recordType = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cld && $self['cld'] = $cld;
        null !== $cli && $self['cli'] = $cli;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $direction && $self['direction'] = $direction;
        null !== $messageType && $self['messageType'] = $messageType;
        null !== $parts && $self['parts'] = $parts;
        null !== $profileName && $self['profileName'] = $profileName;
        null !== $rate && $self['rate'] = $rate;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Id of message detail record.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The destination number for a call, or the callee.
     */
    public function withCld(string $cld): self
    {
        $self = clone $this;
        $self['cld'] = $cld;

        return $self;
    }

    /**
     * The number associated with the person initiating the call, or the caller.
     */
    public function withCli(string $cli): self
    {
        $self = clone $this;
        $self['cli'] = $cli;

        return $self;
    }

    /**
     * Final cost. Cost is calculated as rate * parts.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Message sent time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Currency of the rate and cost.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Direction of message - inbound or outbound.
     */
    public function withDirection(string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

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
     * Number of parts this message has. Max number of character is 160. If message contains more characters then that it will be broken down in multiple parts.
     */
    public function withParts(float $parts): self
    {
        $self = clone $this;
        $self['parts'] = $parts;

        return $self;
    }

    /**
     * Configured profile name. New profiles can be created and configured on Telnyx portal.
     */
    public function withProfileName(string $profileName): self
    {
        $self = clone $this;
        $self['profileName'] = $profileName;

        return $self;
    }

    /**
     * Rate applied to the message.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
