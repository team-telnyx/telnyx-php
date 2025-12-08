<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates client state.
 *
 * @see Telnyx\Services\Calls\ActionsService::updateClientState()
 *
 * @phpstan-type ActionUpdateClientStateParamsShape = array{client_state: string}
 */
final class ActionUpdateClientStateParams implements BaseModel
{
    /** @use SdkModel<ActionUpdateClientStateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Required]
    public string $client_state;

    /**
     * `new ActionUpdateClientStateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUpdateClientStateParams::with(client_state: ...)
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
    public static function with(string $client_state): self
    {
        $obj = new self;

        $obj['client_state'] = $client_state;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }
}
