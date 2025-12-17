<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SipReferTool;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\SipHeader;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\Target;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TargetShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\Target
 * @phpstan-import-type CustomHeaderShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\CustomHeader
 * @phpstan-import-type SipHeaderShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\SipHeader
 *
 * @phpstan-type ReferShape = array{
 *   targets: list<TargetShape>,
 *   customHeaders?: list<CustomHeaderShape>|null,
 *   sipHeaders?: list<SipHeaderShape>|null,
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
    #[Required(list: Target::class)]
    public array $targets;

    /**
     * Custom headers to be added to the SIP REFER.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * SIP headers to be added to the SIP REFER. Currently only User-to-User and Diversion headers are supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Optional('sip_headers', list: SipHeader::class)]
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
     * @param list<TargetShape> $targets
     * @param list<CustomHeaderShape>|null $customHeaders
     * @param list<SipHeaderShape>|null $sipHeaders
     */
    public static function with(
        array $targets,
        ?array $customHeaders = null,
        ?array $sipHeaders = null
    ): self {
        $self = new self;

        $self['targets'] = $targets;

        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $sipHeaders && $self['sipHeaders'] = $sipHeaders;

        return $self;
    }

    /**
     * The different possible targets of the SIP refer. The assistant will be able to choose one of the targets to refer the call to.
     *
     * @param list<TargetShape> $targets
     */
    public function withTargets(array $targets): self
    {
        $self = clone $this;
        $self['targets'] = $targets;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP REFER.
     *
     * @param list<CustomHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * SIP headers to be added to the SIP REFER. Currently only User-to-User and Diversion headers are supported.
     *
     * @param list<SipHeaderShape> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $self = clone $this;
        $self['sipHeaders'] = $sipHeaders;

        return $self;
    }
}
