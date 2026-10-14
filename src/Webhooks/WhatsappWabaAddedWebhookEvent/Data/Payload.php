<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data\Payload\RecordType;
use Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   eventID: string,
 *   recordType: \Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data\Payload\RecordType|value-of<\Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data\Payload\RecordType>,
 *   status: Status|value-of<Status>,
 *   wabaID: string,
 *   errors?: list<string>|null,
 *   phoneNumbers?: list<string>|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Signup session ID.
     */
    #[Required('event_id')]
    public string $eventID;

    /**
     * @var value-of<RecordType> $recordType
     */
    #[Required(
        'record_type',
        enum: RecordType::class,
    )]
    public string $recordType;

    /**
     * Signup session outcome.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Meta WhatsApp Business Account identifier.
     */
    #[Required('waba_id')]
    public string $wabaID;

    /**
     * Errors recorded during provisioning.
     *
     * @var list<string>|null $errors
     */
    #[Optional(list: 'string')]
    public ?array $errors;

    /**
     * Phone numbers found on the WABA. Omitted for standard sessions started with a phone_number_id, and for sessions that fail before Telnyx fetches the numbers.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    /**
     * `new Payload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payload::with(eventID: ..., recordType: ..., status: ..., wabaID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)
     *   ->withEventID(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
     *   ->withWabaID(...)
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
     * @param Status|value-of<Status> $status
     * @param list<string>|null $errors
     * @param list<string>|null $phoneNumbers
     */
    public static function with(
        string $eventID,
        RecordType|string $recordType,
        Status|string $status,
        string $wabaID,
        ?array $errors = null,
        ?array $phoneNumbers = null,
    ): self {
        $self = new self;

        $self['eventID'] = $eventID;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['wabaID'] = $wabaID;

        null !== $errors && $self['errors'] = $errors;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Signup session ID.
     */
    public function withEventID(string $eventID): self
    {
        $self = clone $this;
        $self['eventID'] = $eventID;

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
     * Signup session outcome.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

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

    /**
     * Errors recorded during provisioning.
     *
     * @param list<string> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Phone numbers found on the WABA. Omitted for standard sessions started with a phone_number_id, and for sessions that fail before Telnyx fetches the numbers.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
