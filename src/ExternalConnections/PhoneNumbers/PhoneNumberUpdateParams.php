<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously update settings of the phone number associated with the given external connection.
 *
 * @see Telnyx\ExternalConnections\PhoneNumbers->update
 *
 * @phpstan-type PhoneNumberUpdateParamsShape = array{
 *   id: string, location_id?: string
 * }
 */
final class PhoneNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * Identifies the location to assign the phone number to.
     */
    #[Api(optional: true)]
    public ?string $location_id;

    /**
     * `new PhoneNumberUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberUpdateParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberUpdateParams)->withID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $id, ?string $location_id = null): self
    {
        $obj = new self;

        $obj->id = $id;

        null !== $location_id && $obj->location_id = $location_id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Identifies the location to assign the phone number to.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->location_id = $locationID;

        return $obj;
    }
}
