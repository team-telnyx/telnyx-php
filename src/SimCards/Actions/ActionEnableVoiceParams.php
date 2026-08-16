<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API enables voice calling on a SIM card. When a <code>connection_id</code> is provided, the SIM is associated with the specified Mobile Voice Connection. The connection must be owned by the same user and of type <code>mobile_voice</code>.<br/>
 * The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
 *
 * @see Telnyx\Services\SimCards\ActionsService::enableVoice()
 *
 * @phpstan-type ActionEnableVoiceParamsShape = array{connectionID?: string|null}
 */
final class ActionEnableVoiceParams implements BaseModel
{
    /** @use SdkModel<ActionEnableVoiceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identifier of the Mobile Voice Connection to associate with this SIM card. The connection must be owned by the same user and of type <code>mobile_voice</code>. If omitted, voice is enabled without a connection association.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $connectionID = null): self
    {
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The identifier of the Mobile Voice Connection to associate with this SIM card. The connection must be owned by the same user and of type <code>mobile_voice</code>. If omitted, voice is enabled without a connection association.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }
}
