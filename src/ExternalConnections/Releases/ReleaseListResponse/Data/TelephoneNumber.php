<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type telephone_number = array{numberID?: string, phoneNumber?: string}
 */
final class TelephoneNumber implements BaseModel
{
    /** @use SdkModel<telephone_number> */
    use SdkModel;

    /**
     * Phone number ID from the Telnyx API.
     */
    #[Api('number_id', optional: true)]
    public ?string $numberID;

    /**
     * Phone number in E164 format.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

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
        ?string $numberID = null,
        ?string $phoneNumber = null
    ): self {
        $obj = new self;

        null !== $numberID && $obj->numberID = $numberID;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Phone number ID from the Telnyx API.
     */
    public function withNumberID(string $numberID): self
    {
        $obj = clone $this;
        $obj->numberID = $numberID;

        return $obj;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
