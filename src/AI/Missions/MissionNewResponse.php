<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MissionDataShape from \Telnyx\AI\Missions\MissionData
 *
 * @phpstan-type MissionNewResponseShape = array{
 *   data: MissionData|MissionDataShape
 * }
 */
final class MissionNewResponse implements BaseModel
{
    /** @use SdkModel<MissionNewResponseShape> */
    use SdkModel;

    #[Required]
    public MissionData $data;

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
     * @param MissionData|MissionDataShape $data
     */
    public static function with(MissionData|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MissionData|MissionDataShape $data
     */
    public function withData(MissionData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
