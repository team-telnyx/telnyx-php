<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephoneNumberShape = array{
 *   number_id?: string|null, phone_number?: string|null
 * }
 */
final class TelephoneNumber implements BaseModel
{
    /** @use SdkModel<TelephoneNumberShape> */
    use SdkModel;

    /**
     * Phone number ID from the Telnyx API.
     */
    #[Api(optional: true)]
    public ?string $number_id;

    /**
     * Phone number in E164 format.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

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
        ?string $number_id = null,
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $number_id && $obj->number_id = $number_id;
        null !== $phone_number && $obj->phone_number = $phone_number;

        return $obj;
    }

    /**
     * Phone number ID from the Telnyx API.
     */
    public function withNumberID(string $numberID): self
    {
        $obj = clone $this;
        $obj->number_id = $numberID;

        return $obj;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }
}
