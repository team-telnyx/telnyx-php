<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   externalConnectionID?: string|null,
 *   telephoneNumber?: string|null,
 *   ticketID?: string|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The external connection the log message is associated with, if any.
     */
    #[Optional('external_connection_id')]
    public ?string $externalConnectionID;

    /**
     * The telephone number the log message is associated with, if any.
     */
    #[Optional('telephone_number')]
    public ?string $telephoneNumber;

    /**
     * The ticket ID for an operation that generated the log message, if any.
     */
    #[Optional('ticket_id')]
    public ?string $ticketID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $externalConnectionID = null,
        ?string $telephoneNumber = null,
        ?string $ticketID = null,
    ): self {
        $self = new self;

        null !== $externalConnectionID && $self['externalConnectionID'] = $externalConnectionID;
        null !== $telephoneNumber && $self['telephoneNumber'] = $telephoneNumber;
        null !== $ticketID && $self['ticketID'] = $ticketID;

        return $self;
    }

    /**
     * The external connection the log message is associated with, if any.
     */
    public function withExternalConnectionID(string $externalConnectionID): self
    {
        $self = clone $this;
        $self['externalConnectionID'] = $externalConnectionID;

        return $self;
    }

    /**
     * The telephone number the log message is associated with, if any.
     */
    public function withTelephoneNumber(string $telephoneNumber): self
    {
        $self = clone $this;
        $self['telephoneNumber'] = $telephoneNumber;

        return $self;
    }

    /**
     * The ticket ID for an operation that generated the log message, if any.
     */
    public function withTicketID(string $ticketID): self
    {
        $self = clone $this;
        $self['ticketID'] = $ticketID;

        return $self;
    }
}
