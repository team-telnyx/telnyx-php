<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberRetrieveParams); // set properties as needed
 * $client->externalConnections.phoneNumbers->retrieve(...$params->toArray());
 * ```
 * Return the details of a phone number associated with the given external connection.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->externalConnections.phoneNumbers->retrieve(...$params->toArray());`
 *
 * @see Telnyx\ExternalConnections\PhoneNumbers->retrieve
 *
 * @phpstan-type phone_number_retrieve_params = array{id: string}
 */
final class PhoneNumberRetrieveParams implements BaseModel
{
    /** @use SdkModel<phone_number_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new PhoneNumberRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberRetrieveParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
