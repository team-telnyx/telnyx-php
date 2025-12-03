<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\Refer;

use Telnyx\AI\Assistants\AssistantTool\Refer\Refer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\Refer\Refer\SipHeader;
use Telnyx\AI\Assistants\AssistantTool\Refer\Refer\Target;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReferShape = array{
 *   targets: list<Target>,
 *   custom_headers?: list<CustomHeader>|null,
 *   sip_headers?: list<SipHeader>|null,
 * }
 */
final class Refer implements BaseModel
{
    /** @use SdkModel<ReferShape> */
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
     * @var list<CustomHeader>|null $custom_headers
     */
    #[Api(list: CustomHeader::class, optional: true)]
    public ?array $custom_headers;

    /**
     * SIP headers to be added to the SIP REFER. Currently only User-to-User and Diversion headers are supported.
     *
     * @var list<SipHeader>|null $sip_headers
     */
    #[Api(list: SipHeader::class, optional: true)]
    public ?array $sip_headers;

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
     * @param list<CustomHeader> $custom_headers
     * @param list<SipHeader> $sip_headers
     */
    public static function with(
        array $targets,
        ?array $custom_headers = null,
        ?array $sip_headers = null
    ): self {
        $obj = new self;

        $obj->targets = $targets;

        null !== $custom_headers && $obj->custom_headers = $custom_headers;
        null !== $sip_headers && $obj->sip_headers = $sip_headers;

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
        $obj->custom_headers = $customHeaders;

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
        $obj->sip_headers = $sipHeaders;

        return $obj;
    }
}
