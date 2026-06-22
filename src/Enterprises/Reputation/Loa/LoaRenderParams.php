<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Loa;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature;

/**
 * Render the LOA for this enterprise as a PDF. The enterprise identity, address, and authorized-representative contact are taken from the enterprise record; the optional `agent` block is supplied only when a third-party partner manages the numbers. The response is the PDF itself (unsigned unless a `signature` is provided). Sign it and upload it to the Telnyx Documents API (`POST /v2/documents`, see https://developers.telnyx.com/api/documents) to obtain the `loa_document_id` required by `POST .../reputation`.
 *
 * @see Telnyx\Services\Enterprises\Reputation\LoaService::render()
 *
 * @phpstan-import-type AgentInputShape from \Telnyx\Enterprises\Reputation\Loa\AgentInput
 * @phpstan-import-type SignatureShape from \Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature
 *
 * @phpstan-type LoaRenderParamsShape = array{
 *   agent?: null|AgentInput|AgentInputShape,
 *   signature?: null|Signature|SignatureShape,
 * }
 */
final class LoaRenderParams implements BaseModel
{
    /** @use SdkModel<LoaRenderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
     */
    #[Optional]
    public ?AgentInput $agent;

    /**
     * Optional signature embedded in the rendered PDF. When omitted the PDF is returned unsigned for the customer to sign and upload.
     */
    #[Optional]
    public ?Signature $signature;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AgentInput|AgentInputShape|null $agent
     * @param Signature|SignatureShape|null $signature
     */
    public static function with(
        AgentInput|array|null $agent = null,
        Signature|array|null $signature = null
    ): self {
        $self = new self;

        null !== $agent && $self['agent'] = $agent;
        null !== $signature && $self['signature'] = $signature;

        return $self;
    }

    /**
     * Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
     *
     * @param AgentInput|AgentInputShape $agent
     */
    public function withAgent(AgentInput|array $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    /**
     * Optional signature embedded in the rendered PDF. When omitted the PDF is returned unsigned for the customer to sign and upload.
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
