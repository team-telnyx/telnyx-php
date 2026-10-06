<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingRouting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingData\RecordType;

/**
 * @phpstan-type CallingRoutingDataShape = array{
 *   connectionID: string|null,
 *   phoneNumber: string,
 *   recordType: RecordType|value-of<RecordType>,
 * }
 */
final class CallingRoutingData implements BaseModel
{
    /** @use SdkModel<CallingRoutingDataShape> */
    use SdkModel;

    /**
     * ID of the routing connection, or `null` when none is set.
     */
    #[Required('connection_id')]
    public ?string $connectionID;

    /**
     * Phone number in E.164 format, with a leading `+`.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new CallingRoutingData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingRoutingData::with(connectionID: ..., phoneNumber: ..., recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingRoutingData)
     *   ->withConnectionID(...)
     *   ->withPhoneNumber(...)
     *   ->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $connectionID,
        string $phoneNumber,
        RecordType|string $recordType
    ): self {
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['phoneNumber'] = $phoneNumber;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ID of the routing connection, or `null` when none is set.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Phone number in E.164 format, with a leading `+`.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

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
}
