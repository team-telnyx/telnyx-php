<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse\Data;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse\Data\Local;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse\Data\TollFree;

/**
 * @phpstan-type CountryCoverageGetCountryResponseShape = array{data?: Data|null}
 */
final class CountryCoverageGetCountryResponse implements BaseModel
{
    /** @use SdkModel<CountryCoverageGetCountryResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   code?: string|null,
     *   features?: list<string>|null,
     *   international_sms?: bool|null,
     *   inventory_coverage?: bool|null,
     *   local?: Local|null,
     *   mobile?: array<string,mixed>|null,
     *   national?: array<string,mixed>|null,
     *   numbers?: bool|null,
     *   p2p?: bool|null,
     *   phone_number_type?: list<string>|null,
     *   quickship?: bool|null,
     *   region?: string|null,
     *   reservable?: bool|null,
     *   shared_cost?: array<string,mixed>|null,
     *   toll_free?: TollFree|null,
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
     *   code?: string|null,
     *   features?: list<string>|null,
     *   international_sms?: bool|null,
     *   inventory_coverage?: bool|null,
     *   local?: Local|null,
     *   mobile?: array<string,mixed>|null,
     *   national?: array<string,mixed>|null,
     *   numbers?: bool|null,
     *   p2p?: bool|null,
     *   phone_number_type?: list<string>|null,
     *   quickship?: bool|null,
     *   region?: string|null,
     *   reservable?: bool|null,
     *   shared_cost?: array<string,mixed>|null,
     *   toll_free?: TollFree|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
