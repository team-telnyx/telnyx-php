<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Subresources details for a recording if available.
 *
 * @phpstan-type TexmlRecordingSubresourcesUrisShape = array{
 *   transcriptions?: string|null
 * }
 */
final class TexmlRecordingSubresourcesUris implements BaseModel
{
    /** @use SdkModel<TexmlRecordingSubresourcesUrisShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $transcriptions;

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
        string|Omitted|null $transcriptions = Omitted::VALUE
    ): self {
        $self = new self;

        Omitted::VALUE !== $transcriptions && $self['transcriptions'] = $transcriptions;

        return $self;
    }

    public function withTranscriptions(?string $transcriptions): self
    {
        $self = clone $this;
        $self['transcriptions'] = $transcriptions;

        return $self;
    }
}
