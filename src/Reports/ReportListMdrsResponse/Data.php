<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsResponse;

use Telnyx\Core\Attributes\Api;
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
 *   created_at?: \DateTimeInterface|null,
 *   currency?: value-of<Currency>|null,
 *   direction?: string|null,
 *   message_type?: value-of<MessageType>|null,
 *   parts?: float|null,
 *   profile_name?: string|null,
 *   rate?: string|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Id of message detail record.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The destination number for a call, or the callee.
     */
    #[Api(optional: true)]
    public ?string $cld;

    /**
     * The number associated with the person initiating the call, or the caller.
     */
    #[Api(optional: true)]
    public ?string $cli;

    /**
     * Final cost. Cost is calculated as rate * parts.
     */
    #[Api(optional: true)]
    public ?string $cost;

    /**
     * Message sent time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Currency of the rate and cost.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Api(enum: Currency::class, optional: true)]
    public ?string $currency;

    /**
     * Direction of message - inbound or outbound.
     */
    #[Api(optional: true)]
    public ?string $direction;

    /**
     * Type of message.
     *
     * @var value-of<MessageType>|null $message_type
     */
    #[Api(enum: MessageType::class, optional: true)]
    public ?string $message_type;

    /**
     * Number of parts this message has. Max number of character is 160. If message contains more characters then that it will be broken down in multiple parts.
     */
    #[Api(optional: true)]
    public ?float $parts;

    /**
     * Configured profile name. New profiles can be created and configured on Telnyx portal.
     */
    #[Api(optional: true)]
    public ?string $profile_name;

    /**
     * Rate applied to the message.
     */
    #[Api(optional: true)]
    public ?string $rate;

    #[Api(optional: true)]
    public ?string $record_type;

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
     * @param Currency|value-of<Currency> $currency
     * @param MessageType|value-of<MessageType> $message_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $cld = null,
        ?string $cli = null,
        ?string $cost = null,
        ?\DateTimeInterface $created_at = null,
        Currency|string|null $currency = null,
        ?string $direction = null,
        MessageType|string|null $message_type = null,
        ?float $parts = null,
        ?string $profile_name = null,
        ?string $rate = null,
        ?string $record_type = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $cld && $obj->cld = $cld;
        null !== $cli && $obj->cli = $cli;
        null !== $cost && $obj->cost = $cost;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $currency && $obj['currency'] = $currency;
        null !== $direction && $obj->direction = $direction;
        null !== $message_type && $obj['message_type'] = $message_type;
        null !== $parts && $obj->parts = $parts;
        null !== $profile_name && $obj->profile_name = $profile_name;
        null !== $rate && $obj->rate = $rate;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Id of message detail record.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The destination number for a call, or the callee.
     */
    public function withCld(string $cld): self
    {
        $obj = clone $this;
        $obj->cld = $cld;

        return $obj;
    }

    /**
     * The number associated with the person initiating the call, or the caller.
     */
    public function withCli(string $cli): self
    {
        $obj = clone $this;
        $obj->cli = $cli;

        return $obj;
    }

    /**
     * Final cost. Cost is calculated as rate * parts.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Message sent time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Currency of the rate and cost.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Direction of message - inbound or outbound.
     */
    public function withDirection(string $direction): self
    {
        $obj = clone $this;
        $obj->direction = $direction;

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
     * Number of parts this message has. Max number of character is 160. If message contains more characters then that it will be broken down in multiple parts.
     */
    public function withParts(float $parts): self
    {
        $obj = clone $this;
        $obj->parts = $parts;

        return $obj;
    }

    /**
     * Configured profile name. New profiles can be created and configured on Telnyx portal.
     */
    public function withProfileName(string $profileName): self
    {
        $obj = clone $this;
        $obj->profile_name = $profileName;

        return $obj;
    }

    /**
     * Rate applied to the message.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
