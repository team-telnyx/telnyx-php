<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroup\DataLimit;

/**
 * @phpstan-type SimCardGroupUpdateResponseShape = array{data?: SimCardGroup|null}
 */
final class SimCardGroupUpdateResponse implements BaseModel
{
    /** @use SdkModel<SimCardGroupUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SimCardGroup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardGroup|array{
     *   id?: string|null,
     *   consumedData?: ConsumedData|null,
     *   createdAt?: string|null,
     *   dataLimit?: DataLimit|null,
     *   default?: bool|null,
     *   name?: string|null,
     *   privateWirelessGatewayID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   wirelessBlocklistID?: string|null,
     * } $data
     */
    public static function with(SimCardGroup|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SimCardGroup|array{
     *   id?: string|null,
     *   consumedData?: ConsumedData|null,
     *   createdAt?: string|null,
     *   dataLimit?: DataLimit|null,
     *   default?: bool|null,
     *   name?: string|null,
     *   privateWirelessGatewayID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   wirelessBlocklistID?: string|null,
     * } $data
     */
    public function withData(SimCardGroup|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
