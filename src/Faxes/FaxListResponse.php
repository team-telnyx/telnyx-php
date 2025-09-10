<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type fax_list_response = array{data?: list<Fax>|null, meta?: mixed}
 */
final class FaxListResponse implements BaseModel
{
    /** @use SdkModel<fax_list_response> */
    use SdkModel;

    /** @var list<Fax>|null $data */
    #[Api(list: Fax::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public mixed $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Fax> $data
     */
    public static function with(?array $data = null, mixed $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Fax> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(mixed $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
