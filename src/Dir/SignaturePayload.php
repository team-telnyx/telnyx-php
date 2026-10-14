<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type SignaturePayloadShape = array{
 *   imageBase64: string, signerName?: string|null
 * }
 */
final class SignaturePayload implements BaseModel
{
    /** @use SdkModel<SignaturePayloadShape> */
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
     * `new SignaturePayload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SignaturePayload::with(imageBase64: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SignaturePayload)->withImageBase64(...)
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
        string|Omitted|null $signerName = Omitted::VALUE
    ): self {
        $self = new self;

        $self['imageBase64'] = $imageBase64;

        Omitted::VALUE !== $signerName && $self['signerName'] = $signerName;

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
