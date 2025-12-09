<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse\Data;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse\Data\Type;

/**
 * @phpstan-type SupportingDocumentNewResponseShape = array{data?: list<Data>|null}
 */
final class SupportingDocumentNewResponse implements BaseModel
{
    /** @use SdkModel<SupportingDocumentNewResponseShape> */
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
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
