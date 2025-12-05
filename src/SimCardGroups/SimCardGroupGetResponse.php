<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCardGroups\SimCardGroup\DataLimit;

/**
 * @phpstan-type SimCardGroupGetResponseShape = array{data?: SimCardGroup|null}
 */
final class SimCardGroupGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardGroupGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   consumed_data?: ConsumedData|null,
     *   created_at?: string|null,
     *   data_limit?: DataLimit|null,
     *   default?: bool|null,
     *   name?: string|null,
     *   private_wireless_gateway_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   wireless_blocklist_id?: string|null,
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
     *   consumed_data?: ConsumedData|null,
     *   created_at?: string|null,
     *   data_limit?: DataLimit|null,
     *   default?: bool|null,
     *   name?: string|null,
     *   private_wireless_gateway_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   wireless_blocklist_id?: string|null,
     * } $data
     */
    public function withData(SimCardGroup|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
