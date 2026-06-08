<?php

declare(strict_types=1);

namespace Telnyx\CallReasons;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Check up to 10 candidate `call_reasons` strings against Telnyx's vetting heuristics before sending them on a DIR create or update. The endpoint flags strings that are likely to be rejected during vetting (too generic, banned phrases, length issues, etc.) so you can fix them up front.
 *
 * @see Telnyx\Services\CallReasonsService::validate()
 *
 * @phpstan-type CallReasonValidateParamsShape = array{body: list<string>}
 */
final class CallReasonValidateParams implements BaseModel
{
    /** @use SdkModel<CallReasonValidateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * **Bare JSON array** of candidate call-reason strings (NOT an object - there is no top-level `call_reasons` key on this endpoint). 1–10 strings, each ≤64 characters.
     *
     * @var list<string> $body
     */
    #[Required(list: 'string')]
    public array $body;

    /**
     * `new CallReasonValidateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallReasonValidateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallReasonValidateParams)->withBody(...)
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
     * @param list<string> $body
     */
    public static function with(array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * **Bare JSON array** of candidate call-reason strings (NOT an object - there is no top-level `call_reasons` key on this endpoint). 1–10 strings, each ≤64 characters.
     *
     * @param list<string> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
