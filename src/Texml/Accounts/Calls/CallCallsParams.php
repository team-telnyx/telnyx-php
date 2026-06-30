<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params;

/**
 * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::calls()
 *
 * @phpstan-import-type ParamsShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Params
 *
 * @phpstan-type CallCallsParamsShape = array{params: Params|ParamsShape}
 */
final class CallCallsParams implements BaseModel
{
    /** @use SdkModel<CallCallsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Initiate a TeXML call. Provide either `Url` (fetches TeXML from URL) or `Texml` (inline TeXML), or neither (uses the application default). `Url` and `Texml` are mutually exclusive.
     */
    #[Required]
    public Params $params;

    /**
     * `new CallCallsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallCallsParams::with(params: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallCallsParams)->withParams(...)
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
     * @param Params|ParamsShape $params
     */
    public static function with(Params|array $params): self
    {
        $self = new self;

        $self['params'] = $params;

        return $self;
    }

    /**
     * Initiate a TeXML call. Provide either `Url` (fetches TeXML from URL) or `Texml` (inline TeXML), or neither (uses the application default). `Url` and `Texml` are mutually exclusive.
     *
     * @param Params|ParamsShape $params
     */
    public function withParams(Params|array $params): self
    {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }
}
