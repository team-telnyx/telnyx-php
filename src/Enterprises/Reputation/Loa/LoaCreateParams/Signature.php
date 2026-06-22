<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Loa\LoaCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional signature embedded in the rendered PDF. When omitted the PDF is returned unsigned for the customer to sign and upload.
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
     * Base64-encoded signature image.
     */
    #[Required('image_base64')]
    public string $imageBase64;

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
     * Base64-encoded signature image.
     */
    public function withImageBase64(string $imageBase64): self
    {
        $self = clone $this;
        $self['imageBase64'] = $imageBase64;

        return $self;
    }

    public function withSignerName(?string $signerName): self
    {
        $self = clone $this;
        $self['signerName'] = $signerName;

        return $self;
    }
}
