<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   external_connection_id?: string|null,
 *   telephone_number?: string|null,
 *   ticket_id?: string|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The external connection the log message is associated with, if any.
     */
    #[Api(optional: true)]
    public ?string $external_connection_id;

    /**
     * The telephone number the log message is associated with, if any.
     */
    #[Api(optional: true)]
    public ?string $telephone_number;

    /**
     * The ticket ID for an operation that generated the log message, if any.
     */
    #[Api(optional: true)]
    public ?string $ticket_id;

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
        ?string $external_connection_id = null,
        ?string $telephone_number = null,
        ?string $ticket_id = null,
    ): self {
        $obj = new self;

        null !== $external_connection_id && $obj->external_connection_id = $external_connection_id;
        null !== $telephone_number && $obj->telephone_number = $telephone_number;
        null !== $ticket_id && $obj->ticket_id = $ticket_id;

        return $obj;
    }

    /**
     * The external connection the log message is associated with, if any.
     */
    public function withExternalConnectionID(string $externalConnectionID): self
    {
        $obj = clone $this;
        $obj->external_connection_id = $externalConnectionID;

        return $obj;
    }

    /**
     * The telephone number the log message is associated with, if any.
     */
    public function withTelephoneNumber(string $telephoneNumber): self
    {
        $obj = clone $this;
        $obj->telephone_number = $telephoneNumber;

        return $obj;
    }

    /**
     * The ticket ID for an operation that generated the log message, if any.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj->ticket_id = $ticketID;

        return $obj;
    }
}
