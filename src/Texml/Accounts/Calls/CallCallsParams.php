<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\ApplicationDefault;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithTeXml;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithURL;

/**
 * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::calls()
 *
 * @phpstan-import-type BodyVariants from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Body
 * @phpstan-import-type BodyShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Body
 *
 * @phpstan-type CallCallsParamsShape = array{body: BodyShape}
 */
final class CallCallsParams implements BaseModel
{
    /** @use SdkModel<CallCallsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var BodyVariants $body */
    #[Required(union: Body::class)]
    public WithURL|WithTeXml|ApplicationDefault $body;

    /**
     * `new CallCallsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallCallsParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallCallsParams)->withBody(...)
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
     * @param BodyShape $body
     */
    public static function with(
        WithURL|array|WithTeXml|ApplicationDefault $body
    ): self {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param BodyShape $body
     */
    public function withBody(
        WithURL|array|WithTeXml|ApplicationDefault $body
    ): self {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
