<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Status;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Type;

/**
 * @phpstan-type OtaUpdateGetResponseShape = array{data?: Data|null}
 */
final class OtaUpdateGetResponse implements BaseModel
{
    /** @use SdkModel<OtaUpdateGetResponseShape> */
    use SdkModel;

    /**
     * This object represents an Over the Air (OTA) update request. It allows tracking the current status of a operation that apply settings in a particular SIM card. <br/><br/>.
     */
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
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   sim_card_id?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * This object represents an Over the Air (OTA) update request. It allows tracking the current status of a operation that apply settings in a particular SIM card. <br/><br/>.
     *
     * @param Data|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   sim_card_id?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
