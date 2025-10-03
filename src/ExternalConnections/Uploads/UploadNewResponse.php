<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type upload_new_response = array{success?: bool, ticketID?: string}
 */
final class UploadNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<upload_new_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * Describes wether or not the operation was successful.
     */
    #[Api(optional: true)]
    public ?bool $success;

    /**
     * Ticket id of the upload request.
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
        ?bool $success = null,
        ?string $ticketID = null
    ): self {
        $obj = new self;

        null !== $success && $obj->success = $success;
        null !== $ticketID && $obj->ticketID = $ticketID;

        return $obj;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }

    /**
     * Ticket id of the upload request.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj->ticketID = $ticketID;

        return $obj;
    }
}
