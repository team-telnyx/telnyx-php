<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappAccountUpdate\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\WhatsappAccountUpdate\Data\Payload\RecordType;

/**
 * @phpstan-type PayloadShape = array{
 *   event: string,
 *   recordType: \Telnyx\Webhooks\WhatsappAccountUpdate\Data\Payload\RecordType|value-of<\Telnyx\Webhooks\WhatsappAccountUpdate\Data\Payload\RecordType>,
 *   wabaID: string,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Account event reported by Meta. Coexistence lifecycle values include `ACCOUNT_OFFBOARDED`, `ACCOUNT_RECONNECTED`, and `PARTNER_REMOVED`. Preserve unknown values for forward compatibility.
     */
    #[Required]
    public string $event;

    /**
     * @var value-of<RecordType> $recordType
     */
    #[Required(
        'record_type',
        enum: RecordType::class,
    )]
    public string $recordType;

    /**
     * Meta WhatsApp Business Account identifier.
     */
    #[Required('waba_id')]
    public string $wabaID;

    /**
     * `new Payload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payload::with(event: ..., recordType: ..., wabaID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)->withEvent(...)->withRecordType(...)->withWabaID(...)
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
        string $event,
        RecordType|string $recordType,
        string $wabaID,
    ): self {
        $self = new self;

        $self['event'] = $event;
        $self['recordType'] = $recordType;
        $self['wabaID'] = $wabaID;

        return $self;
    }

    /**
     * Account event reported by Meta. Coexistence lifecycle values include `ACCOUNT_OFFBOARDED`, `ACCOUNT_RECONNECTED`, and `PARTNER_REMOVED`. Preserve unknown values for forward compatibility.
     */
    public function withEvent(string $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(
        RecordType|string $recordType,
    ): self {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Meta WhatsApp Business Account identifier.
     */
    public function withWabaID(string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }
}
