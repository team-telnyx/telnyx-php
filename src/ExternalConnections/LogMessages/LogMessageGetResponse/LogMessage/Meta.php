<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse\LogMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   externalConnectionID?: string, telephoneNumber?: string, ticketID?: string
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The external connection the log message is associated with, if any.
     */
    #[Api('external_connection_id', optional: true)]
    public ?string $externalConnectionID;

    /**
     * The telephone number the log message is associated with, if any.
     */
    #[Api('telephone_number', optional: true)]
    public ?string $telephoneNumber;

    /**
     * The ticket ID for an operation that generated the log message, if any.
     */
    #[Api('ticket_id', optional: true)]
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
        $obj = new self;

        null !== $externalConnectionID && $obj->externalConnectionID = $externalConnectionID;
        null !== $telephoneNumber && $obj->telephoneNumber = $telephoneNumber;
        null !== $ticketID && $obj->ticketID = $ticketID;

        return $obj;
    }

    /**
     * The external connection the log message is associated with, if any.
     */
    public function withExternalConnectionID(string $externalConnectionID): self
    {
        $obj = clone $this;
        $obj->externalConnectionID = $externalConnectionID;

        return $obj;
    }

    /**
     * The telephone number the log message is associated with, if any.
     */
    public function withTelephoneNumber(string $telephoneNumber): self
    {
        $obj = clone $this;
        $obj->telephoneNumber = $telephoneNumber;

        return $obj;
    }

    /**
     * The ticket ID for an operation that generated the log message, if any.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj->ticketID = $ticketID;

        return $obj;
    }
}
