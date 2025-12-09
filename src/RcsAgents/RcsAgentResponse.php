<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsAgentResponseShape = array{data?: RcsAgent|null}
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
     * @param RcsAgent|array{
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profileID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * } $data
     */
    public static function with(RcsAgent|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RcsAgent|array{
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profileID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * } $data
     */
    public function withData(RcsAgent|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
