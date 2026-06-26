<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirCreateLoaParams\Agent;
use Telnyx\Dir\DirCreateLoaParams\Signature;

/**
 * Generate a pre-filled Letter of Authorization (LOA) PDF for a DIR. Enterprise identity (legal name, DBA, address, contact, website, tax id) and the DIR display name are read server-side; the caller supplies the telephone numbers to authorize, an optional Authorized Agent block, and an optional drawn signature.
 *
 * When `signature` is omitted the PDF is returned unsigned so the customer can sign it externally and upload it via the Documents API. When `signature` is present the PDF embeds the supplied image, printed name, and signed-at date.
 *
 * Returns `application/pdf`.
 *
 * @see Telnyx\Services\DirService::createLoa()
 *
 * @phpstan-import-type AgentShape from \Telnyx\Dir\DirCreateLoaParams\Agent
 * @phpstan-import-type SignatureShape from \Telnyx\Dir\DirCreateLoaParams\Signature
 *
 * @phpstan-type DirCreateLoaParamsShape = array{
 *   phoneNumbers: list<string>,
 *   agent?: null|Agent|AgentShape,
 *   signature?: null|Signature|SignatureShape,
 * }
 */
final class DirCreateLoaParams implements BaseModel
{
    /** @use SdkModel<DirCreateLoaParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Telephone numbers to authorize on the DIR, in `+E164` format (`+` followed by 10-15 digits). Max 15 per request.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
     */
    #[Optional]
    public ?Agent $agent;

    /**
     * Optional. When provided the rendered PDF embeds the signature image, printed name, and signed-at date. When absent the PDF is returned unsigned so the customer can sign externally and upload it via the Documents API.
     */
    #[Optional]
    public ?Signature $signature;

    /**
     * `new DirCreateLoaParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirCreateLoaParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirCreateLoaParams)->withPhoneNumbers(...)
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
     * @param list<string> $phoneNumbers
     * @param Agent|AgentShape|null $agent
     * @param Signature|SignatureShape|null $signature
     */
    public static function with(
        array $phoneNumbers,
        Agent|array|null $agent = null,
        Signature|array|null $signature = null,
    ): self {
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;

        null !== $agent && $self['agent'] = $agent;
        null !== $signature && $self['signature'] = $signature;

        return $self;
    }

    /**
     * Telephone numbers to authorize on the DIR, in `+E164` format (`+` followed by 10-15 digits). Max 15 per request.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
     *
     * @param Agent|AgentShape $agent
     */
    public function withAgent(Agent|array $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    /**
     * Optional. When provided the rendered PDF embeds the signature image, printed name, and signed-at date. When absent the PDF is returned unsigned so the customer can sign externally and upload it via the Documents API.
     *
     * @param Signature|SignatureShape $signature
     */
    public function withSignature(Signature|array $signature): self
    {
        $self = clone $this;
        $self['signature'] = $signature;

        return $self;
    }
}
