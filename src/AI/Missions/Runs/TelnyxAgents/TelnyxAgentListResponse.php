<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\TelnyxAgents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TelnyxAgentDataShape from \Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentData
 *
 * @phpstan-type TelnyxAgentListResponseShape = array{
 *   data: list<TelnyxAgentData|TelnyxAgentDataShape>
 * }
 */
final class TelnyxAgentListResponse implements BaseModel
{
    /** @use SdkModel<TelnyxAgentListResponseShape> */
    use SdkModel;

    /** @var list<TelnyxAgentData> $data */
    #[Required(list: TelnyxAgentData::class)]
    public array $data;

    /**
     * `new TelnyxAgentListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxAgentListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxAgentListResponse)->withData(...)
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
     * @param list<TelnyxAgentData|TelnyxAgentDataShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<TelnyxAgentData|TelnyxAgentDataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
