<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\OtaUpdates\OtaUpdateGetResponse\Data
 *
 * @phpstan-type OtaUpdateGetResponseShape = array{data?: null|Data|DataShape}
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
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * This object represents an Over the Air (OTA) update request. It allows tracking the current status of a operation that apply settings in a particular SIM card. <br/><br/>.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
