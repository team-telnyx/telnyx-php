<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse\Data;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse\Data\Type;

/**
 * @phpstan-type SupportingDocumentListResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class SupportingDocumentListResponse implements BaseModel
{
    /** @use SdkModel<SupportingDocumentListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id: string,
     *   createdAt: string,
     *   documentID: string,
     *   portoutID: string,
     *   recordType: string,
     *   type: value-of<Type>,
     *   updatedAt: string,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id: string,
     *   createdAt: string,
     *   documentID: string,
     *   portoutID: string,
     *   recordType: string,
     *   type: value-of<Type>,
     *   updatedAt: string,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
