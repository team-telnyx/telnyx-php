<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RcsAgentShape from \Telnyx\RcsAgents\RcsAgent
 *
 * @phpstan-type RcsAgentResponseShape = array{data?: null|RcsAgent|RcsAgentShape}
 */
final class RcsAgentResponse implements BaseModel
{
    /** @use SdkModel<RcsAgentResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RcsAgent $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsAgent|RcsAgentShape|null $data
     */
    public static function with(RcsAgent|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RcsAgent|RcsAgentShape $data
     */
    public function withData(RcsAgent|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
