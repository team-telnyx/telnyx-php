<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MissionRunDataShape from \Telnyx\AI\Missions\Runs\MissionRunData
 *
 * @phpstan-type RunGetResponseShape = array{
 *   data: MissionRunData|MissionRunDataShape
 * }
 */
final class RunGetResponse implements BaseModel
{
    /** @use SdkModel<RunGetResponseShape> */
    use SdkModel;

    #[Required]
    public MissionRunData $data;

    /**
     * `new RunGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RunGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RunGetResponse)->withData(...)
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
     * @param MissionRunData|MissionRunDataShape $data
     */
    public static function with(MissionRunData|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MissionRunData|MissionRunDataShape $data
     */
    public function withData(MissionRunData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
