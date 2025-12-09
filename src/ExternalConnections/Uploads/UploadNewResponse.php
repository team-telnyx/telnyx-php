<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UploadNewResponseShape = array{
 *   success?: bool|null, ticketID?: string|null
 * }
 */
final class UploadNewResponse implements BaseModel
{
    /** @use SdkModel<UploadNewResponseShape> */
    use SdkModel;

    /**
     * Describes wether or not the operation was successful.
     */
    #[Optional]
    public ?bool $success;

    /**
     * Ticket id of the upload request.
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
        ?bool $success = null,
        ?string $ticketID = null
    ): self {
        $self = new self;

        null !== $success && $self['success'] = $success;
        null !== $ticketID && $self['ticketID'] = $ticketID;

        return $self;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * Ticket id of the upload request.
     */
    public function withTicketID(string $ticketID): self
    {
        $self = clone $this;
        $self['ticketID'] = $ticketID;

        return $self;
    }
}
