<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the stored status and result of an action. Use this to poll actions that returned 202; HTTP 200 can contain any action status. Stored observations contain metadata with empty tree and refs, not the full snapshot; submit a fresh observe action to obtain current refs.
 *
 * @see Telnyx\Services\BrowserSessions\ActionsService::retrieve()
 *
 * @phpstan-type ActionRetrieveParamsShape = array{id: string}
 */
final class ActionRetrieveParams implements BaseModel
{
    /** @use SdkModel<ActionRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new ActionRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionRetrieveParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
