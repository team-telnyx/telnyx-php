<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage;

use Telnyx\Core\Attributes\Optional;
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
     *   code?: string|null,
     *   features?: list<string>|null,
     *   internationalSMS?: bool|null,
     *   inventoryCoverage?: bool|null,
     *   local?: Local|null,
     *   mobile?: array<string,mixed>|null,
     *   national?: array<string,mixed>|null,
     *   numbers?: bool|null,
     *   p2p?: bool|null,
     *   phoneNumberType?: list<string>|null,
     *   quickship?: bool|null,
     *   region?: string|null,
     *   reservable?: bool|null,
     *   sharedCost?: array<string,mixed>|null,
     *   tollFree?: TollFree|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   code?: string|null,
     *   features?: list<string>|null,
     *   internationalSMS?: bool|null,
     *   inventoryCoverage?: bool|null,
     *   local?: Local|null,
     *   mobile?: array<string,mixed>|null,
     *   national?: array<string,mixed>|null,
     *   numbers?: bool|null,
     *   p2p?: bool|null,
     *   phoneNumberType?: list<string>|null,
     *   quickship?: bool|null,
     *   region?: string|null,
     *   reservable?: bool|null,
     *   sharedCost?: array<string,mixed>|null,
     *   tollFree?: TollFree|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
