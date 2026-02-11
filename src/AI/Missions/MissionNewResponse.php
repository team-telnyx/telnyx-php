<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

use Telnyx\AI\Missions\MissionNewResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Missions\MissionNewResponse\Data
 *
 * @phpstan-type MissionNewResponseShape = array{data: Data|DataShape}
 */
final class MissionNewResponse implements BaseModel
{
    /** @use SdkModel<MissionNewResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new MissionNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MissionNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MissionNewResponse)->withData(...)
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
     *
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
