<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UploadNewResponseShape = array{
 *   success?: bool|null, ticket_id?: string|null
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
    #[Optional]
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
        ?bool $success = null,
        ?string $ticket_id = null
    ): self {
        $obj = new self;

        null !== $success && $obj['success'] = $success;
        null !== $ticket_id && $obj['ticket_id'] = $ticket_id;

        return $obj;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }

    /**
     * Ticket id of the upload request.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj['ticket_id'] = $ticketID;

        return $obj;
    }
}
