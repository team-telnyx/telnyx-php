<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts\MessagingOptoutListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
 *
 * @phpstan-type FilterShape = array{from?: string, messagingProfileID?: string}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code) to retrieve opt-outs for.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The ID of the messaging profile to retrieve opt-outs for.
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

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
        ?string $from = null,
        ?string $messagingProfileID = null
    ): self {
        $obj = new self;

        null !== $from && $obj->from = $from;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * The sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code) to retrieve opt-outs for.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The ID of the messaging profile to retrieve opt-outs for.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }
}
