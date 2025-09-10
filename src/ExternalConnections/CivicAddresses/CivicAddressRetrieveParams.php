<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CivicAddressRetrieveParams); // set properties as needed
 * $client->externalConnections.civicAddresses->retrieve(...$params->toArray());
 * ```
 * Return the details of an existing Civic Address with its Locations inside the 'data' attribute of the response.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->externalConnections.civicAddresses->retrieve(...$params->toArray());`
 *
 * @see Telnyx\ExternalConnections\CivicAddresses->retrieve
 *
 * @phpstan-type civic_address_retrieve_params = array{id: string}
 */
final class CivicAddressRetrieveParams implements BaseModel
{
    /** @use SdkModel<civic_address_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new CivicAddressRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CivicAddressRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CivicAddressRetrieveParams)->withID(...)
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
