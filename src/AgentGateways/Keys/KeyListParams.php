<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists the instance's keys, without their values. Returns the first 100. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\KeysService::list()
 *
 * @phpstan-type KeyListParamsShape = array{teamID?: string|null}
 */
final class KeyListParams implements BaseModel
{
    /** @use SdkModel<KeyListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Only the keys of this team.
     */
    #[Optional]
    public ?string $teamID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $teamID = null): self
    {
        $self = new self;

        null !== $teamID && $self['teamID'] = $teamID;

        return $self;
    }

    /**
     * Only the keys of this team.
     */
    public function withTeamID(string $teamID): self
    {
        $self = clone $this;
        $self['teamID'] = $teamID;

        return $self;
    }
}
