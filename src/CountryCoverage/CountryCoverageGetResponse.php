<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\Local;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\TollFree;

/**
 * @phpstan-type CountryCoverageGetResponseShape = array{
 *   data?: array<string,Data>|null
 * }
 */
final class CountryCoverageGetResponse implements BaseModel
{
    /** @use SdkModel<CountryCoverageGetResponseShape> */
    use SdkModel;

    /** @var array<string,Data>|null $data */
    #[Optional(map: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,Data|array{
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
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param array<string,Data|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
