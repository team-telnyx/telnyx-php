<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

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
    public static function with(?string $transcriptions = null): self
    {
        $obj = new self;

        null !== $transcriptions && $obj['transcriptions'] = $transcriptions;

        return $obj;
    }

    public function withTranscriptions(?string $transcriptions): self
    {
        $obj = clone $this;
        $obj['transcriptions'] = $transcriptions;

        return $obj;
    }
}
