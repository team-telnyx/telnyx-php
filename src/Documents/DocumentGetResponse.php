<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DocServiceDocumentShape from \Telnyx\Documents\DocServiceDocument
 *
 * @phpstan-type DocumentGetResponseShape = array{
 *   data?: null|DocServiceDocument|DocServiceDocumentShape
 * }
 */
final class DocumentGetResponse implements BaseModel
{
    /** @use SdkModel<DocumentGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?DocServiceDocument $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocServiceDocumentShape $data
     */
    public static function with(DocServiceDocument|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DocServiceDocumentShape $data
     */
    public function withData(DocServiceDocument|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
