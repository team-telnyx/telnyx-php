<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The Letter of Authorization in which a Brand Owner authorizes an approved BPO (Business Process Outsourcer) to place branded calls that display this DIR on the owner's behalf. Both parties are read from the caller's account: the Brand Owner is the enterprise that owns the DIR, and the BPO is `bpo_enterprise_id`. No business identity is accepted in the body.
 *
 * When `signature` is omitted the PDF is returned unsigned so the Brand Owner can sign it externally and the BPO can upload it via the Documents API. When `signature` is present the PDF embeds the supplied image, printed name, and signed-at date.
 *
 * Returns `application/pdf`.
 *
 * @see Telnyx\Services\DirService::bpoLoa()
 *
 * @phpstan-import-type SignaturePayloadShape from \Telnyx\Dir\SignaturePayload
 *
 * @phpstan-type DirBpoLoaParamsShape = array{
 *   bpoEnterpriseID: string,
 *   signature?: null|SignaturePayload|SignaturePayloadShape,
 * }
 */
final class DirBpoLoaParams implements BaseModel
{
    /** @use SdkModel<DirBpoLoaParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The approved BPO enterprise the Brand Owner is authorizing. Must be a BPO account on the caller's organization that has already been approved.
     */
    #[Required('bpo_enterprise_id')]
    public string $bpoEnterpriseID;

    /**
     * Optional. When provided the rendered PDF embeds the signature image, printed name, and signed-at date. When absent the PDF is returned unsigned so the Brand Owner can sign externally and the BPO can upload it via the Documents API.
     */
    #[Optional]
    public ?SignaturePayload $signature;

    /**
     * `new DirBpoLoaParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirBpoLoaParams::with(bpoEnterpriseID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirBpoLoaParams)->withBpoEnterpriseID(...)
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
     * @param SignaturePayload|SignaturePayloadShape|null $signature
     */
    public static function with(
        string $bpoEnterpriseID,
        SignaturePayload|array|null $signature = null
    ): self {
        $self = new self;

        $self['bpoEnterpriseID'] = $bpoEnterpriseID;

        null !== $signature && $self['signature'] = $signature;

        return $self;
    }

    /**
     * The approved BPO enterprise the Brand Owner is authorizing. Must be a BPO account on the caller's organization that has already been approved.
     */
    public function withBpoEnterpriseID(string $bpoEnterpriseID): self
    {
        $self = clone $this;
        $self['bpoEnterpriseID'] = $bpoEnterpriseID;

        return $self;
    }

    /**
     * Optional. When provided the rendered PDF embeds the signature image, printed name, and signed-at date. When absent the PDF is returned unsigned so the Brand Owner can sign externally and the BPO can upload it via the Documents API.
     *
     * @param SignaturePayload|SignaturePayloadShape $signature
     */
    public function withSignature(SignaturePayload|array $signature): self
    {
        $self = clone $this;
        $self['signature'] = $signature;

        return $self;
    }
}
