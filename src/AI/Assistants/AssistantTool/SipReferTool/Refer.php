<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SipReferTool;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\SipHeader;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\Target;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type refer_alias = array{
 *   targets: list<Target>,
 *   customHeaders?: list<CustomHeader>|null,
 *   sipHeaders?: list<SipHeader>|null,
 * }
 */
final class Refer implements BaseModel
{
    /** @use SdkModel<refer_alias> */
    use SdkModel;

    /**
     * The different possible targets of the SIP refer. The assistant will be able to choose one of the targets to refer the call to.
     *
     * @var list<Target> $targets
     */
    #[Api(list: Target::class)]
    public array $targets;

    /**
     * Custom headers to be added to the SIP REFER.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomHeader::class, optional: true)]
    public ?array $customHeaders;

    /**
     * SIP headers to be added to the SIP REFER. Currently only User-to-User and Diversion headers are supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Api('sip_headers', list: SipHeader::class, optional: true)]
    public ?array $sipHeaders;

    /**
     * `new Refer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Refer::with(targets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Refer)->withTargets(...)
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
     * @param list<Target> $targets
     * @param list<CustomHeader> $customHeaders
     * @param list<SipHeader> $sipHeaders
     */
    public static function with(
        array $targets,
        ?array $customHeaders = null,
        ?array $sipHeaders = null
    ): self {
        $obj = new self;

        $obj->targets = $targets;

        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;

        return $obj;
    }

    /**
     * The different possible targets of the SIP refer. The assistant will be able to choose one of the targets to refer the call to.
     *
     * @param list<Target> $targets
     */
    public function withTargets(array $targets): self
    {
        $obj = clone $this;
        $obj->targets = $targets;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP REFER.
     *
     * @param list<CustomHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

        return $obj;
    }

    /**
     * SIP headers to be added to the SIP REFER. Currently only User-to-User and Diversion headers are supported.
     *
     * @param list<SipHeader> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj->sipHeaders = $sipHeaders;

        return $obj;
    }
}
