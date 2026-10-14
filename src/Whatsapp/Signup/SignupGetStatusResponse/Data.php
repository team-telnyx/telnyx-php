<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Signup\SignupGetStatusResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse\Data\RecordType;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse\Data\State;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   customerID?: string|null,
 *   errors?: list<string>|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   sessionID?: string|null,
 *   state?: null|State|value-of<State>,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   wabaID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Tech provider customer reference submitted with the signup.
     */
    #[Optional('customer_id')]
    public ?string $customerID;

    /**
     * Errors recorded during provisioning.
     *
     * @var list<string>|null $errors
     */
    #[Optional(list: 'string')]
    public ?array $errors;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Signup session ID.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    /**
     * Current provisioning step, or the step that failed. `REGISTER_PHONE_NUMBER` is skipped for coexistence signups.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    /**
     * `INCOMPLETE` waits for the Meta signup code, `PENDING` is in progress, `SUCCESS` finished provisioning, and `FAILURE` stopped at `state`.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Telnyx user ID that owns the signup session.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Meta WhatsApp Business Account ID.
     */
    #[Optional('waba_id')]
    public ?string $wabaID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $errors
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param State|value-of<State>|null $state
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?\DateTimeInterface $createdAt = null,
        ?string $customerID = null,
        ?array $errors = null,
        RecordType|string|null $recordType = null,
        ?string $sessionID = null,
        State|string|null $state = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
        ?string $wabaID = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerID && $self['customerID'] = $customerID;
        null !== $errors && $self['errors'] = $errors;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;
        null !== $wabaID && $self['wabaID'] = $wabaID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Tech provider customer reference submitted with the signup.
     */
    public function withCustomerID(string $customerID): self
    {
        $self = clone $this;
        $self['customerID'] = $customerID;

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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Signup session ID.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Current provisioning step, or the step that failed. `REGISTER_PHONE_NUMBER` is skipped for coexistence signups.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * `INCOMPLETE` waits for the Meta signup code, `PENDING` is in progress, `SUCCESS` finished provisioning, and `FAILURE` stopped at `state`.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Telnyx user ID that owns the signup session.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Meta WhatsApp Business Account ID.
     */
    public function withWabaID(string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }
}
