<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse\Data;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse\Data\Location;

/**
 * @phpstan-type CivicAddressGetResponseShape = array{data?: Data|null}
 */
final class CivicAddressGetResponse implements BaseModel
{
    /** @use SdkModel<CivicAddressGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   cityOrTown?: string|null,
     *   cityOrTownAlias?: string|null,
     *   companyName?: string|null,
     *   country?: string|null,
     *   countryOrDistrict?: string|null,
     *   defaultLocationID?: string|null,
     *   description?: string|null,
     *   houseNumber?: string|null,
     *   houseNumberSuffix?: string|null,
     *   locations?: list<Location>|null,
     *   postalOrZipCode?: string|null,
     *   recordType?: string|null,
     *   stateOrProvince?: string|null,
     *   streetName?: string|null,
     *   streetSuffix?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   cityOrTown?: string|null,
     *   cityOrTownAlias?: string|null,
     *   companyName?: string|null,
     *   country?: string|null,
     *   countryOrDistrict?: string|null,
     *   defaultLocationID?: string|null,
     *   description?: string|null,
     *   houseNumber?: string|null,
     *   houseNumberSuffix?: string|null,
     *   locations?: list<Location>|null,
     *   postalOrZipCode?: string|null,
     *   recordType?: string|null,
     *   stateOrProvince?: string|null,
     *   streetName?: string|null,
     *   streetSuffix?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
