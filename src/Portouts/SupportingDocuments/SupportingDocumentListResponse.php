<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments;

use Telnyx\Core\Attributes\Api;
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
    #[Api(list: Data::class, optional: true)]
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
     *   created_at: string,
     *   document_id: string,
     *   portout_id: string,
     *   record_type: string,
     *   type: value-of<Type>,
     *   updated_at: string,
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
     *   created_at: string,
     *   document_id: string,
     *   portout_id: string,
     *   record_type: string,
     *   type: value-of<Type>,
     *   updated_at: string,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
