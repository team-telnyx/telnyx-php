<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\TelnyxAgents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TelnyxAgentDataShape from \Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentData
 *
 * @phpstan-type TelnyxAgentLinkResponseShape = array{
 *   data: TelnyxAgentData|TelnyxAgentDataShape
 * }
 */
final class TelnyxAgentLinkResponse implements BaseModel
{
    /** @use SdkModel<TelnyxAgentLinkResponseShape> */
    use SdkModel;

    #[Required]
    public TelnyxAgentData $data;

    /**
     * `new TelnyxAgentLinkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxAgentLinkResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxAgentLinkResponse)->withData(...)
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
     * @param TelnyxAgentData|TelnyxAgentDataShape $data
     */
    public static function with(TelnyxAgentData|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param TelnyxAgentData|TelnyxAgentDataShape $data
     */
    public function withData(TelnyxAgentData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
