<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return the details of an existing Civic Address with its Locations inside the 'data' attribute of the response.
 *
 * @see Telnyx\Services\ExternalConnections\CivicAddressesService::retrieve()
 *
 * @phpstan-type CivicAddressRetrieveParamsShape = array{id: string}
 */
final class CivicAddressRetrieveParams implements BaseModel
{
    /** @use SdkModel<CivicAddressRetrieveParamsShape> */
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

        $obj['id'] = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }
}
