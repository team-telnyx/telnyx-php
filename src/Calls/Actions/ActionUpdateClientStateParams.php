<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates client state.
 *
 * @see Telnyx\Calls\Actions->updateClientState
 *
 * @phpstan-type ActionUpdateClientStateParamsShape = array{clientState: string}
 */
final class ActionUpdateClientStateParams implements BaseModel
{
    /** @use SdkModel<ActionUpdateClientStateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state')]
    public string $clientState;

    /**
     * `new ActionUpdateClientStateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUpdateClientStateParams::with(clientState: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionUpdateClientStateParams)->withClientState(...)
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
    public static function with(string $clientState): self
    {
        $obj = new self;

        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }
}
