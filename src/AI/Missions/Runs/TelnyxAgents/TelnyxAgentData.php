<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\TelnyxAgents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelnyxAgentDataShape = array{
 *   createdAt: \DateTimeInterface, runID: string, telnyxAgentID: string
 * }
 */
final class TelnyxAgentData implements BaseModel
{
    /** @use SdkModel<TelnyxAgentDataShape> */
    use SdkModel;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('run_id')]
    public string $runID;

    #[Required('telnyx_agent_id')]
    public string $telnyxAgentID;

    /**
     * `new TelnyxAgentData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxAgentData::with(createdAt: ..., runID: ..., telnyxAgentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxAgentData)
     *   ->withCreatedAt(...)
     *   ->withRunID(...)
     *   ->withTelnyxAgentID(...)
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
     */
    public static function with(
        \DateTimeInterface $createdAt,
        string $runID,
        string $telnyxAgentID
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['runID'] = $runID;
        $self['telnyxAgentID'] = $telnyxAgentID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }

    public function withTelnyxAgentID(string $telnyxAgentID): self
    {
        $self = clone $this;
        $self['telnyxAgentID'] = $telnyxAgentID;

        return $self;
    }
}
