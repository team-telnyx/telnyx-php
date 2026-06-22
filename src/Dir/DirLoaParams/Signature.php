<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirLoaParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional. When provided the rendered PDF embeds the signature image, printed name, and signed-at date. When absent the PDF is returned unsigned so the customer can sign externally and upload it via the Documents API.
 *
 * @phpstan-type SignatureShape = array{
 *   imageBase64: string, signerName?: string|null
 * }
 */
final class Signature implements BaseModel
{
    /** @use SdkModel<SignatureShape> */
    use SdkModel;

    /**
     * PNG image, base64-encoded.
     */
    #[Required('image_base64')]
    public string $imageBase64;

    /**
     * Optional. When absent the rendered PDF falls back to the enterprise contact's legal name.
     */
    #[Optional('signer_name', nullable: true)]
    public ?string $signerName;

    /**
     * `new Signature()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Signature::with(imageBase64: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Signature)->withImageBase64(...)
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
    public static function with(
        string $imageBase64,
        ?string $signerName = null
    ): self {
        $self = new self;

        $self['imageBase64'] = $imageBase64;

        null !== $signerName && $self['signerName'] = $signerName;

        return $self;
    }

    /**
     * PNG image, base64-encoded.
     */
    public function withImageBase64(string $imageBase64): self
    {
        $self = clone $this;
        $self['imageBase64'] = $imageBase64;

        return $self;
    }

    /**
     * Optional. When absent the rendered PDF falls back to the enterprise contact's legal name.
     */
    public function withSignerName(?string $signerName): self
    {
        $self = clone $this;
        $self['signerName'] = $signerName;

        return $self;
    }
}
